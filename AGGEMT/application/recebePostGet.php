<?php
/**
 * Arquivo de controle de recebimento de requisições. 
 * Muito bom para controlar requisições e direcioná-las para a classe de controle correspondente 
 * @var $_GET e $_POST
 * @author João Batista Padilha e Silva --- joao.padilha@globo.com
 * @since 23/11/2010
 */
define("PATH_PROJETO", $_SERVER['DOCUMENT_ROOT']."/");
define("PATH_PROJETO_APPLICATION", $_SERVER['DOCUMENT_ROOT']."/application/");
define("PATH_PROJETO_IMAGEM_UPLOAD", "/home/joaopadilha/aggemt.joaopadilha.com/public/images/");
define("PROJETO_CONTEXT", "http://aggemt.joaopadilha.com/");
require_once 'ProjetoUtil.php';
require_once 'GruposUsuarios.php';
require_once 'control/ControlGeral.php';
require_once 'Mensagens.php';
new ProjetoUtil();
session_start();
$MENSAGEM_SUCESSO = Array();
$MENSAGEM_ERRO = Array();
$grupo = (isset($_SESSION['grupo'])) ?$_SESSION['grupo'] : null;
try {
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET': 
			{
				if(isset($_GET['control']))				
				{
					$control = "Controla".$_GET['control']; //Classe Control
					require 'control/'.$control.".php";
					$controla = new $control();
					if($controla->permiteAcesso($grupo)){
						$controla->get($_GET);
					}
					else
					{
						$MENSAGEM_ERRO[] = Mensagens::getMensagem("ACESSO_NEGADO");
						header("Location:".PROJETO_CONTEXT."public/admin/conteudoInicial.php?mensagemErro=".urlencode(serialize($MENSAGEM_ERRO)));		
					}
				}
				elseif (isset($_GET['sair']))
				{
					session_destroy();
					header("Location: ".ControlGeral::$PAGINA_INICIO);
				}
				else
				{
					$MENSAGEM_ERRO[] = Mensagens::getMensagem("ERRO_ACESSAR_FUNCIONALIDADE");
					header("Location:".PROJETO_CONTEXT."public/admin/conteudoInicial.php?mensagemErro=".urlencode(serialize($MENSAGEM_ERRO)));
				}
				break;	
			}
		case 'POST': 
			{
				if(isset($_POST['control']))
				{
					$control = "Controla".$_POST['control']; //Classe Control
					require 'control/'.$control.".php";
					$controla = new $control();
					if($controla->permiteAcesso($grupo))
					{
						if($_FILES == null)
						{
							$controla->post($_POST);
						}
						else {
							$controla->post($_POST,$_FILES);
						}
					}
					elseif (isset($_POST['funcao']) && $_POST['funcao'] == "votar")
					{
						$controla->post($_POST);
					}
					else
					{
						$MENSAGEM_ERRO[] = Mensagens::getMensagem("ACESSO_NEGADO");
						header("Location:".PROJETO_CONTEXT."public/admin/conteudoInicial.php?mensagemErro=".urlencode(serialize($MENSAGEM_ERRO)));		
					}
				}
				else
				{
					$MENSAGEM_ERRO[] = Mensagens::getMensagem("ERRO_ACESSAR_FUNCIONALIDADE");
					//header("Location:".PROJETO_CONTEXT."public/admin/conteudoInicial.php?mensagemErro=".urlencode(serialize($MENSAGEM_ERRO)));
				}
				break;
			}
		default:
			{
				header("Location: ".ControlGeral::$PAGINA_INICIO);
			}
	}
}
catch (Exception $e)
{
	$MENSAGEM_ERRO[] = Mensagens::getMensagem("ERRO").$e->getMessage();
	header("Location:".PROJETO_CONTEXT."public/admin/index.php?mensagemErro=".urlencode(serialize($MENSAGEM_ERRO))); 
}
