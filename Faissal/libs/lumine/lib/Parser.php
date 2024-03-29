<?php
/**
 * @author Hugo Ferreira da Silva
 * @link http://www.hufersil.com.br
 * @package Lumine
 */

/**
 * Classe para fazer parses de strings
 * @package Lumine
 * @author Hugo Ferreira da Silva
 * @link http://www.hufersil.com.br
 */
class Lumine_Parser {
	/**
	 * Faz o parse de uma string 
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base $obj
	 * @param string $str
	 * @param array $args
	 * @return string
	 */
	public static function parsePart(Lumine_Base $obj, $str, $args = null)
	{
		$total = strlen($str);
		$inStr = false;
		$start = '';
		$nova = '';
		$tmp = '';
		
		for($i=0; $i<$total; $i++) 
		{
			$c = substr($str, $i, 1);
			
			if($inStr == false && ($c == "'" || $c == '"'))
			{
				$tmp = self::parseEntityValues($obj, $tmp, $args);
				$nova .= $tmp;
				$tmp = '';
				$inStr = true;
				$start = $c;
				continue;
			}
			
			if($inStr == true && $c == $start)
			{
				$tmp_test = str_replace( $obj->_getConnection()->getEscapeChar() . $start, '', $c . $tmp . $c);
				if( substr_count($tmp_test, "'") % 2 == 0 )
				{
					$nova .= $start . $tmp . $start;
					$inStr = false;
					$tmp = '';
					$start = '';
					continue;
				}
			}
			
			$tmp .= $c;
		}
		
		if($tmp != '')
		{
			if($inStr == true)
			{

			}
			$nova .= self::parseEntityValues($obj, $tmp, $args);
		}
		
		return $nova;
	}
	
	/**
	 * Faz o parse de valores da entidade em um SQL
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base $obj
	 * @param string $str
	 * @param array $args
	 * @return string
	 */
	
	public static function parseEntityValues(Lumine_Base $obj, $str, $args = null){
		// pegamos todos os fields encontrados
		preg_match_all('@((\b\w+\.\w+\b)|\{(\w+\.\w+)\}|\{(\w+)\})@', $str, $fields);
		// pegamos os wildcards encontrados
		preg_match_all('@(%?\?%?|:\w+)@', $str, $wildcards);
		// se o argumento nao for array
		if(!is_array($args)){
			$args = array($args);
		}
		
		// pegamos os objetos relacionados
		$list = $obj->_getObjectPart('_join_list');
		
		// pegamos a conexao
		$cnn = $obj->_getConnection();
		
		// armazena os campos
		$fieldList = array();
		// armazena os objetos
		$objList = array();
		
		for($i=0; $i<count($fields[0]); $i++){
			$target = null;
			$field = null;
			
			// primeiro, procurando por alias.field
			if(!empty($fields[2][$i])){
				list($alias,$fieldname) = explode('.', $fields[2][$i]);
				
				// para cada entidade relacionada
				foreach($list as $entity){
					if($entity->_getAlias() == $alias){
						$field = $entity->_getField($fieldname);
						$target = $entity;
						break;
					}
				}
				
				
			// procurando por {Classe.campo}
			} else if(!empty($fields[3][$i])) {
				list($classname, $fieldname) = explode('.', $fields[3][$i]);
				
				// para cada entidade relacionada
				foreach($list as $entity){
					if($entity->_getName() == $classname){
						$field = $entity->_getField($fieldname);
						$target = $entity;
						break;
					}
				}
				
			// procurando por {campo}
			} else if(!empty($fields[4][$i])) {
				$target = $obj;
				$field = $obj->_getField($fields[4][$i]);
				
			// se nao encontrou, passa para o proximo
			} else {
				continue;
			}
			
			// armazena os resultados encontrados
			$fieldList[] = $field;
			$objList[] = $target;
		}
		
		// campo atual
		$currentField = null;
		// objeto atual
		$currentObj = null;
		// indice do wildcard
		$currentWildcard = 0;
		
		// agora que ja temos os objetos/campos
		// vamos iterar pelos wildcards para trocar os valores
		for($i=0; $i<count($wildcards[0]); $i++){
			if(count($fieldList) > 0){
				$currentField = array_shift($fieldList);
				$currentObj = array_shift($objList);
			}
			
			// se nao tem campo, dispara excecao
			if(empty($currentField)){
				throw new Exception('Nenhum campo encontrado para prepared statement');
			}
			
			// se for por binding de nome 
			if(preg_match('@:(\w+)\b@', $wildcards[0][$i], $reg)){
				$val = empty($args[0][$reg[1]]) ? '' : $args[0][$reg[1]];
				
			// do contrario
			} else {
				$val = empty($args[$i]) ? '' : $args[$i];
				
			}
			
			$str_val = '';
			
			// se o parametro nao for um array
			if( !is_array($val) ){
				switch($wildcards[0][$i]){
					case '?%':
						$val = self::getParsedValue($currentObj, $val.'%', $currentField['type']);
					break;
					
					case '%?':
						$val = self::getParsedValue($currentObj, '%'.$val, $currentField['type']);
					break;
					
					case '%?%':
						$val = self::getParsedValue($currentObj, '%'.$val.'%', $currentField['type']);
					break;
					
					case '?':
					default:
						
						// verifica se tinha um like antes
						$part = substr($str, $currentWildcard, strpos($str, $wildcards[0][$i]) - $currentWildcard + 1);
						if(preg_match('@like@i', $part)){
							$val = self::getParsedValue($currentObj, $val, $currentField['type'], true);
							
						} else {
							$val = self::getParsedValue($currentObj, $val, $currentField['type']);
							
						}
					break;
				}
				
				$str_val = $val;
				
			// mas se for um array
			} else {
				foreach($val as $idx => $value){
					$val[$idx] = self::getParsedValue($currentObj, $value, $currentField['type']);
				}
				
				// convertemos o array para a string
				$str_val = implode(', ', $val);
			}
			
			// grava a posicao do ultimo wildcard
			$currentWildcard = strpos($str, $wildcards[0][$i]) + strlen($str_val);
			
			// agora, vamos substituir 
			$card = str_replace('?','\\?',$wildcards[0][$i]);
			$str = preg_replace('@' . $card .'@', $str_val, $str, 1);
		}
		
		return $str;
	}
	
	/**
	 * Faz o parse do valor para SQL
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base|array $obj
	 * @param mixed             $val
	 * @param string            $type
	 * @param boolean           $islike
	 * @return mixed
	 */
	public static function getParsedValue($obj, $val, $type, $islike = false)
	{
		if( is_null( $val ) == true )
		{
			return 'NULL';
		}
		switch($type)
		{
			case 'int':
			case 'integer':
				$val = sprintf('%d', $val);
				break;
		
			case 'float':
			case 'double':
				$val = sprintf('%f', $val);
				break;
			
			case 'date':
				/*
				if(is_numeric($val))
				{
					$val = "'" . date('Y-m-d', $val) . "'";
				} else {
					$val = "'" . date('Y-m-d', strtotime($val)) . "'";
				}*/
				$val = "'" . Lumine_Util::FormatDate( $val, '%Y-%m-%d' ) . "'";
				break;
			
			case 'datetime':
				/*
				if(is_numeric($val))
				{
					$val = "'" . date('Y-m-d H:i:s', $val) . "'";
				} else {
					$val = "'" . date('Y-m-d H:i:s', strtotime($val)) . "'";
				}
				*/
				$val = "'" . Lumine_Util::FormatDateTime( $val, '%Y-%m-%d %H:%M:%S' ) . "'";
				break;
				
			case 'time':
			    $val = Lumine_Util::FormatTime($val, '%H:%M:%S');
			    $val = "'" . $val . "'";
			    break;

			case 'boolean':
				$val = sprintf("'%d'", $val);
				break;
			
			case 'string':
			case 'text':
			case 'varchar':
			case 'char':
			default:
				if( $islike == true)
				{
					$val = "'%" . $obj->_getConnection()->escape( $val ) . "%'";
				} else {
					$val = "'" . $obj->_getConnection()->escape( $val ) . "'";
				}
				break;
		}
		
		return $val;
	}
	
	/**
	 * Faz o parse de valores para SQL
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base $obj
	 * @param string $str
	 * @return mixed
	 */
	public static function parseSQLValues(Lumine_Base $obj, $str)
	{
		$total = strlen($str);
		$inStr = false;
		$start = '';
		$nova = '';
		$tmp = '';
		
		for($i=0; $i<$total; $i++) 
		{
			$c = substr($str, $i, 1);
			
			if($inStr == false && ($c == "'" || $c == '"'))
			{
				$tmp = self::parseEntityNames($obj, $tmp);
				$nova .= $tmp;
				$tmp = '';
				$inStr = true;
				$start = $c;
				continue;
			}
	
/*			if($inStr == true && $c == $start && substr($str, $i-1, 1) != '\\' && $c != '\\')
			{
				$nova .= $start . $tmp . $start;
				$inStr = false;
				$tmp = '';
				$start = '';
				continue;
				*/
			
			if($inStr == true && $c == $start)
			{
				
				$tmp_test = str_replace( $obj->_getConnection()->getEscapeChar() . $start, '', $c . $tmp . $c);
				
				//if( !substr_count($tmp_test, "'") & 1 )
				if( substr_count($tmp_test, "'") % 2 == 0 )
				{
					$nova .= $start . $tmp . $start;
					$inStr = false;
					$tmp = '';
					$start = '';
					continue;
				}
			}
			
			$tmp .= $c;
		}
		
		if($tmp != '')
		{
			if($inStr == true)
			{
				$tmp = $start . $tmp;
			}
			$nova .= self::parseEntityNames($obj, $tmp);
		}
		
		return $nova;
	}
	
	/**
	 * Faz o parse do objetos em from
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base $obj
	 * @return string
	 */
	public static function parseFromValue( Lumine_Base $obj )
	{
		$schema = $obj->_getConfiguration()->getOption('schema_name');
		if( empty($schema) )
		{
			$name = $obj->tablename();
		} else {
			$name = $schema .'.'. $obj->tablename();
		}
		
		if($obj->_getAlias() != '') 
		{
			$name .= ' '.$obj->_getAlias();
		}
		return $name;
	}
	
	/**
	 * Faz o parse do joins 
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base $obj
	 * @param array $list
	 * @return string
	 */
	public static function parseJoinValues(Lumine_Base $obj, $list)
	{
		$joinStr = implode("\r\n", $obj->_getObjectPart('_join'));
		
		preg_match_all('@(\{(\w+)\.(\w+)\})@', $joinStr, $reg);
		$total = count($reg[0]);
		
		$schema = $obj->_getConfiguration()->getOption('schema_name');
		if( !empty($schema)) 
		{
			$schema .= '.';
		}
		
		for($i=0; $i<$total; $i++)
		{
			if( !empty($reg[2][$i]) && !empty($reg[3][$i])) // exemplo: {Usuario.idusuario}
			{
				// alterado em 28/08/2007
				foreach($list as $ent)
				{
					if($ent->_getName() == $reg[2][$i])
					{
						// $ent = $list[ $reg[2][$i] ];
						$field = $ent->_getField( $reg[3][$i] );
						$name = $ent->tablename();
						$a = $ent->_getAlias();
						
						if( !empty($a) )
						{
							$name = $a;
						}
						
						$joinStr = str_replace($reg[0][$i], $name . '.' .$field['column'], $joinStr);
					}
				}
				
				/*
				if( !empty( $list[ $reg[2][$i] ]))
				{
					$ent = $list[ $reg[2][$i] ];
					$field = $ent->_getField( $reg[3][$i] );
					$name = $ent->tablename();
					$a = $ent->_getAlias();
					
					if( !empty($a) )
					{
						$name = $a;
					}
					
					$joinStr = str_replace($reg[0][$i], $name . '.' .$field['column'], $joinStr);
				}
				*/
			}
		}
		
		preg_match_all('@JOIN (\{(\w+)\})@i', $joinStr, $reg);
		$total = count($reg[0]);
		
		for($i=0; $i<$total; $i++)
		{
			if( !empty($reg[2][$i])) // exemplo: (INNER|LEFT|RIGHT) JOIN {Grupo}
			{
				reset($list);
				
				foreach($list as $ent)
				{
					if($ent->_getName() == $reg[2][$i])
					{
						break;
					}
				}
				// $ent = $list[ $reg[2][$i] ];
				$joinStr = str_replace($reg[0][$i], 'JOIN '. $schema . $ent->tablename() .' ' . $ent->_getAlias(), $joinStr);
			}
		}
		
		return "\r\n".$joinStr;
	}
	
	/**
	 * Faz o parse de nomes de colunas e tabelas de uma string
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br/
	 * @param Lumine_Base $obj
	 * @param string $str
	 * @return string
	 */
	public static function parseEntityNames(Lumine_Base $obj, $str)
	{
		
		// fazer parse de u.nome (alias + . + nome_do_campo) de cada entidade
		$list = $obj->_getObjectPart('_join_list');
		
		foreach($list as $ent)
		{
			$a = $ent->_getAlias();
			$name = $ent->_getName();
			
			if( !empty($a))
			{
				preg_match_all('@\b'.$a.'\b\.(\w+)\b@', $str, $reg);
				$total = count($reg[0]);
				
				for($i=0; $i<$total; $i++) 
				{
					$field = $ent->_getField( $reg[1][$i] );
					$exp = '@\b'.$a.'\b\.('.$reg[1][$i].')\b@';
					$str = preg_replace($exp, $a . '.' . $field['column'], $str);
				}
			}
			
			preg_match_all('@\{'.$name.'\.(\w+)\}@', $str, $reg);
			$total = count($reg[0]);
			
			for($i=0; $i<$total; $i++) 
			{
				$field = $ent->_getField( $reg[1][$i] );
				
				if( !empty($a))
				{
					$str = str_replace($reg[0][$i], $a . '.' . $field['column'], $str);
				} else {
					$str = str_replace($reg[0][$i], $ent->tablename() . '.' . $field['column'], $str);
				}
			}
		}
		
		
		// encontra por {propriedade}
		// quando nao especificado, significa que pertence a mesma entidade
		// chamadora da funcao, por isso nao fazemos loop
		
		preg_match_all('@\{(\w+)\}@', $str, $reg);
		$total = count($reg[0]);
		
		for($i=0; $i<$total; $i++)
		{
			$f = $obj->_getField($reg[1][$i]);
			$a = $obj->_getAlias();
			
			if($a == '')
			{
				$a = $obj->tablename();
			}
			
			$str = str_replace($reg[0][$i], $a . '.'. $f['column'], $str);
		}
		
		return $str;
	}
	
	/**
	 * Trunca os valores de string conforme o comprimento do campo
	 * 
	 * @author Hugo Ferreira da Silva
	 * @param array $prop Propriedades do campo
	 * @param string $value String a ser truncada
	 * @return stirng String truncada
	 */
	public static function truncateValue($prop, $value){
		if( !isset($prop['length']) ){
			return $value;
		}
		
		switch( strtolower($prop['type']) ) {
			case 'text':
			case 'longtext':
			case 'tinytext':
			case 'blob':
			case 'longblob':
			case 'tinyblob':
			case 'varchar':
			case 'varbinary':
			case 'char':
				if( strlen($value) > $prop['length'] ){
					Lumine_Log::warning('Truncando valor do campo ' . (isset($prop['name']) ? $prop['name'] : $prop['column']) . ' ('.$prop['length'].')' );
					$value = substr($value, 0, $prop['length']);
				}
			break;
		}
		
		return $value;
	}
}


?>