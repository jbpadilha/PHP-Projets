<?php
/**
 * Classe usda para criar uma classe on the fly para uma tabela
 * @author Hugo Ferreira da Silva
 * @link http://www.hufersil.com.br
 * @package Lumine
 */

/**
 * Classe usda para criar uma classe on the fly para uma tabela
 * @author Hugo Ferreira da Silva
 * @link http://www.hufersil.com.br
 * @package Lumine
 */
class Lumine_Factory extends Lumine_Base {
	
	/**
	 * Construtor da classe 
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br
	 * @param string $package Nome do pacote
	 * @param string $tablename nome da tabela que ela representa
	 * @return Lumine_Factory
	 */
	function __construct($package, $tablename){
		$this->_tablename = $tablename;
		$this->_package = $package;
		parent::__construct();
	}

	/**
	 * retona a classe criada
	 * 
	 * @author Hugo Ferreira da Silva
	 * @link http://www.hufersil.com.br
	 * @param string $tablename
	 * @param Lumine_Configuration $cfg
	 * @return Lumine_Factory
	 */
	public static function create($tablename, Lumine_Configuration $cfg){
		$pkg = $cfg->getProperty('package');
		
		Lumine_Log::debug('Recuperando campos da tabela '.$tablename);
		
		$fields = $cfg->getConnection()->describe($tablename);
		
		$obj = new Lumine_Factory($pkg,$tablename);
		
		foreach($fields as $item){
			list(
				$name,
				$type_native,
				$type,
				$length,
				$primary,
				$notnull,
				$default,
				$autoincrement
			) = $item;
			
			$options = array(
				'primary' => $primary,
				'notnull' => $notnull,
				'autoincrement' => $autoincrement,
			);
			
			// para o pg, ainda tem o nome da sequence
			if(!empty($item[8]['sequence'])){
				$options['sequence'] = $item[8]['sequence'];
			}
			
			// se tiver um valor padrao
			if(!empty($default)){
				$options['default'] = $default;
			}
			
			$obj->_addField($name,$name,$type,$length,$options);
		}
		
		return $obj;
		
	}
}


?>