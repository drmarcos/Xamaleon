<?php
/*-----------------------------------------------------------------------------------*
@		SISTEMA DE GERENCIAMENTO DE CONTEڄOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATR̓ULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Portugu고- Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       � todos os direitos reservados desde 2007  
@       VERSÏ 1.0     								 
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
unset($pagina);
unset($diretorio);
$pagina = "editar_xml.php";
$diretorio = "2";
session_name("soordle_xamaleon");
session_start();
/*import_request_variables("pg");	*/
extract($_GET);
extract($_POST);
				include("../../classes/var.php");
				$MJO->topo($INCLUDE,$tema);
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");	
if(!isset($arquivo)){
	$arquivo = "";
}

$matricula = "$arquivo";
$qualArquivo = "$matricula.xml";

if($_SESSION["usuario"] != ""){
	if(isset($_POST["atualizar"])){
	
	$qualArquivo = $nomeArquivo;
	$matricula = $matricula2;
						
/* -- [ CRIANDO O ARQUIVO XML ] -- */
					
	include("$INCLUDE/modulos/$NomeModulo/dados_xml.inc.php");
	$arquivo=("$INCLUDE/".$CFG->caminhoArquivosXML."/$diretorio/$matricula.xml");
	$arq=fopen($arquivo,"w");
	fputs($arq,$conteudo);
	fclose ($arq);		
		$FLUTUA = new AvisoDivPop;	
				$FLUTUA->jsAviso("closeAlertaDiv","idiomaDiv","divAlertaFlutuante",$_ATENCAO,$COR3,$_ALTERACAO_SUCESSO,$COR1);				
	}
					
	print "<center>";
	montaMenu();	
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeEditarPasta","","","","")." $_EDITAR</b>");
				$MJO->NCTR();			
	
		include("monta_form.php");
	$MJO->NCTB();				
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";
}
print "<br/>";
$MJO->fim($INCLUDE,$tema);	
?>