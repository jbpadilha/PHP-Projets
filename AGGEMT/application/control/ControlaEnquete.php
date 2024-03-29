<?php

require_once ('ControlGeral.php');

class ControlaEnquete extends ControlGeral {
	
	public function permiteAcesso($grupo) {
		if($grupo == GruposUsuarios::$GRUPO_ADMIN)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function get($GET) {
		
	}
	
	public function post($POST) {
		$enquete = null;
		$this->MENSAGEM_ERRO = Array();
		$this->MENSAGEM_SUCESSO = Array();
		try {
			$function = (isset($POST['funcao']))?$POST['funcao']:null;
			if(!ProjetoUtil::verificaBrancoNulo($function))
			{
				$enquete = new Enquete();
				if($POST['funcao'] == "cadastrar")
				{
					$this->preencheObjeto($enquete, $POST);
					if(count($this->MENSAGEM_ERRO)<=0)
					{
						$this->cadastrar($enquete);						
						$this->MENSAGEM_SUCESSO[] = Mensagens::getMensagem("SUCESSO_CADASTRO");
						header("Location:../public/admin/conteudoInicial.php?mensagemSucesso=".urlencode(serialize($this->MENSAGEM_SUCESSO)));
					}
					else
					{
						throw new Exception();
					}
				}
				elseif($POST['funcao'] == "deletar")
				{
					$idenquete = (isset($POST['idenquete']))?$POST['idenquete']:null;
					if(!ProjetoUtil::verificaBrancoNulo($idenquete))
					{
						$enquete->setIdenquete($idenquete);
						$this->deletar($enquete);
						$this->MENSAGEM_SUCESSO[] = Mensagens::getMensagem("SUCESSO_DELETAR"); 
						header("Location:../public/admin/conteudoInicial.php?mensagemSucesso=".urlencode(serialize($this->MENSAGEM_SUCESSO)));
					}
					else	
					{
						throw new Exception(Mensagens::getMensagem("CAMPO_OBRIGATORIO"));
					}
					
				}
				elseif($POST['funcao'] == "alterar")
				{
					$idenquete = (isset($POST['idenquete']))?$POST['idenquete']:null;
					if(!ProjetoUtil::verificaBrancoNulo($idenquete))
					{
						$enquete->setIdenquete($idenquete);
					}
					$this->preencheObjeto($enquete, $POST);
					if(count($this->MENSAGEM_ERRO)<=0)
					{
						$this->alterar($enquete);
						$this->MENSAGEM_SUCESSO[] = Mensagens::getMensagem("SUCESSO_ALTERAR"); 
						header("Location:../public/admin/conteudoInicial.php?mensagemSucesso=".urlencode(serialize($this->MENSAGEM_SUCESSO)));
					}
					else
					{
						throw new Exception();
					}
				}
				elseif($POST['funcao'] == "votar")
				{
					$idenquete = (isset($POST['idenquete']))?$POST['idenquete']:null;
					if(!ProjetoUtil::verificaBrancoNulo($idenquete))
					{
						//if(!$_COOKIE['enquete_'.$idenquete])
						//{
							$enquete->reset();
							$enquete->setIdenquete($idenquete);
							if($enquete->find())
							{
								while($enquete->fetch())
								{
									$enquete->setStatusenquete(1);
									$metodogetResposta = "getVotos".$POST['resposta']."enqueste";
									$metodosetResposta = "setVotos".$POST['resposta']."enqueste";
									$enquete->$metodosetResposta($enquete->$metodogetResposta()+1);
									$this->alterar($enquete);
									setcookie("enquete_".$idenquete, $_SERVER['REMOTE_ADDR'],  time()+86400);
									echo "Obrigado por votar na enquete.";
								}
							}
						/*}
						else
						{
							echo "Você já votou nessa enquete.";
						}*/
					}
				}
			}
			else
			{
				throw new Exception(Mensagens::getMensagem("ERRO_ACESSAR_FUNCIONALIDADE"));
			}
		}
		catch (Exception $e)
		{
			$this->MENSAGEM_ERRO[] = $e->getMessage();
			header("Location:".PROJETO_CONTEXT."public/admin/conteudoInicial.php?mensagemErro=".urlencode(serialize($this->MENSAGEM_ERRO)));
		}
	}
	
	private function preencheObjeto(Enquete $enquete, $POST)
	{
		$enquete->_setFrom($POST);
		$this->MENSAGEM_ERRO = array_merge($this->MENSAGEM_ERRO, $enquete->validate());
	}
	
	public function cadastrar(Enquete $enquete)
	{
		try {
			$enquete->save();
		}
		catch (Exception $e)
		{
			throw new Exception(Mensagens::getMensagem("ERRO_ACESSAR_FUNCIONALIDADE").$e->getMessage());
		}
	}
	
	public function deletar(Enquete $enquete)
	{
		try {
			if($enquete->getIdenquete() != null)
			{
				$enquete->delete();
			}
			else
			{
				throw new Exception(Mensagens::getMensagem("CAMPO_OBRIGATORIO"));	
			}
		}
		catch (Exception $e)
		{
			throw new Exception(Mensagens::getMensagem("ERRO_ACESSAR_FUNCIONALIDADE").$e->getMessage());
		}
	}
	
	public function alterar(Enquete $enquete)
	{
		try
		{
			$enquete->update();
		}
		catch (Exception $e)
		{
			throw new Exception(Mensagens::getMensagem("ERRO_ACESSAR_FUNCIONALIDADE").$e->getMessage());
		}
	}

}

?>