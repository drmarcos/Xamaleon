<?php
/*-----------------------------------------------------------------------------------*
@		SISTEMA DE GERENCIAMENTO DE CONTEÚdOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATRÍCULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Português- Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       ® todos os direitos reservados desde 2007  
@       VERSÂO 1.0     								 
@
@ NOTICE OF COPYRIGHT ---------------------------------------------------------------*                   
@
@ Copyright (C) 2007  Oliveira M.J.N  http://www.eadgames.com.br        
@ Copyright (C) 2012  Oliveira M.J.N  http://www.soordle.org                    
@
@ This program is free software; you can redistribute it and/or modify  
@ it under the terms of the GNU General Public License as published by  
@ the Free Software Foundation; either version 2 of the License, or     
@ (at your option) any later version.                                   
@
@ This program is distributed in the hope that it will be useful,       
@ but WITHOUT ANY WARRANTY; without even the implied warranty of        
@ MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         
@ GNU General Public License for more details:                          
@
@          http://www.gnu.org/copyleft/gpl.html                         
@                                                                       
@------------------------------------------------------------------------------------*/
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
session_name("soordle_xamaleon");
session_start();

		session_cache_limiter('private_no_expire');
		$cache_limiter = session_cache_limiter();
		session_cache_expire(3);
		$cache_expire = session_cache_expire();
		unset($pagina);
		unset($diretorio);		
		$pagina = "index.php";
		$diretorio = "0";
		include("classes/var.php");
		$MJO->topo($INCLUDE,$tema);
		
		$FLUTUA = new AvisoDivPop;
		//print $FLUTUA->anuncio728();
		//print $FLUTUA->blocoLink728();
//import_request_variables('gp'); 	
/*extract($_GET, EXTR_PREFIX_ALL, 'i');
extract($_POST, EXTR_PREFIX_ALL, 'i');*/

extract($_GET);
extract($_POST);

/* -- [ LOGOUT ] -- */
	
if(isset($_GET['sair'])){
session_name("soordle_xamaleon");
@session_start();
			unset ($_SESSION["usuario"]);
			unset ($sair);
			session_destroy();		
							
			$FLUTUA->jsAviso("closeAlertaDiv","idiomaDiv","divAlertaFlutuante","",$COR2,$_SESSAO_ENCERRADA,$COR1);
		
}	

/* -- [ VERIFICA ACESSO ] -- */

if((isset($_POST["verifica"]))or(isset($_GET["verifica"]))){
	if(!isset($_SESSION["usuario"])){
		$senha = md5("$senha");
		$nome = md5("$nome");
		$_SESSION["usuario"] = $nome;	
		$_SESSION["senha"] = $senha;	
		unset($_SESSION["idioma"]);
		unset($lang);
	}

/* -- [ CADASTRAR ] -- */

	if(($_SESSION["senha"] == "$SenhaGravada")and ($_SESSION["usuario"] == "$usuarioGravado")){			
			if(!$_SESSION["usuario"]) {
			print "<br/><br/><br/><body bgcolor=\"#ff0000\"><center><b>$ERRO_SESSAO</b></center>";
			}else{
				print "<center>";
				montaMenu();							
				//print $FLUTUA->anuncio728();
				
				$MJO->NOTB('width="753" border="1"');			

/* -- [ TABELA COM O FORM PARA CADASTROS ] -- */

				if(!file_exists("$INCLUDE/modulos/$NomeModulo/form_cadastro.php")){				
				$MJO->NOTB('WIDTH="753"');
				$MJO->NTR('ALIGN="CENTER" CLASS="'.$COR1.'"');
				$o = new printConteudo('<br/>'.$_ERRO_CONFIG.'<br/><br/>');
				$MJO->NCTB();
				$MJO->NCTB();
				$MJO->fim($INCLUDE,$tema);
				exit;
				}else{							
					include("$INCLUDE/modulos/$NomeModulo/form_cadastro.php");	
				}
			}		
	}else{
session_name("soordle_xamaleon");	
	@session_start();
			unset ($_SESSION['usuario']);
			unset ($CFG->Admin);
			session_destroy();
		print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";
	}
print "<br/>";	
					

					//print $FLUTUA->anuncio728();
					print $FLUTUA->blocoLink728();
					$BANNER = new banners;
					print '<br/><br/>'.$BANNER->mLink("https://play.google.com/store/apps/dev?id=7396136443061298892").$BANNER->mImg("owpoga_jogos_001","Jogos Opwpoga.com - Google Play").'<br/><br/>';
$MJO->fim($INCLUDE,$tema);
exit;
}
if($autoCadastro == "UM"){
	if(!isset($_SESSION["usuario"])){
	
	if(!isset($lang)){
		$lang = "";
	}elseif(isset($_GET["lang"])){
		$_SESSION["idioma"] = $lang; 
		include("$INCLUDE/idiomas/$_SESSION[idioma]/main.lang.php");		
		include("$INCLUDE/modulos/$NomeModulo/idiomas/$_SESSION[idioma]/main.lang.php");			
	}
		$MU = new menuIdioma;
		$MJO->NOTB('class="topo" border="0" cellspacing="0"');
		$MJO->NTR('class="'.$COR5.'" align="right"');
					$mostraImg = array();
					$mostraImg[1] = $MU->mLink("pt_br").$MU->mImg("1g","Português Brasil - Brazilian/Portuguese");
					$mostraImg[2] = $MU->mLink("es_es").$MU->mImg("2g","Spanish - Espanhol/Spain");
					$mostraImg[3] = $MU->mLink("en_us").$MU->mImg("3g","English -  Inglês/USA");
					$mostraImg[4] = $MU->mLink("en_gb").$MU->mImg("4g","English - Inglês/GB");
					$mostraImg[5] = $MU->mLink("de_de").$MU->mImg("5g","Deutch -  Alemão/Germany");
					$mostraImg[6] = $MU->mLink("fr_fr").$MU->mImg("6g","French -  Francês/French");
					$mostraImg[7] = $MU->mLink("it_it").$MU->mImg("7g","Italian -  Italiano/Italy");
					$mostraImg[8] = $MU->mLink("fi_fi").$MU->mImg("8g","Finland-  Finlandês/Finland");
					$MU->arrayCelulas($mostraImg);		
		$MJO->NCTB();
	}	
}
/* -- [ FORM DE ACESSO ] -- */

print "<center><br>";
include("$INCLUDE/includes/form_login.inc.php");
formLogin();	
print $FLUTUA->blocoLink728();					
$MJO->fim($INCLUDE,$tema);

?>