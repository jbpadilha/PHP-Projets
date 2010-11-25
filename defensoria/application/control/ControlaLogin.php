<?php

require_once ('control\ControlGeral.php');

class ControlaLogin extends ControlGeral {
	/**
	 * @param Array $GET
	 */
	public function get($GET) {
		header(ControlGeral::$PAGINA_INICIAL);
	}

	/**
	 * @param Array $POST
	 */
	public function post($POST) {
		
		$usuarios = null;
		if(!ProjetoUtil::verificaBrancoNulo($POST['usuario']) && !ProjetoUtil::verificaBrancoNulo($POST['senha']))
		{
			$usuarios = new Usuarios();
			$usuarios->setUsuario(trim($POST['usuario']));
			$usuarios->setSenha(trim($POST['senha']));
			if($usuarios->find() > 0)
			{
				$usuarios->registraUsuarioSessao();
				header(ControlGeral::$PAGINA_INICIAL_LOGADO);
			}
			else
			{
				$this->MENSAGEM_ERRO[] = "Usuario ou senha incorreto. Tente novamente";
				$this->get();
			}
		}
		
	}

	/**
	 * @param int $grupo
	 */
	public function permiteAcesso($grupo) {
		return true;
	}

	
	
	
}

?>