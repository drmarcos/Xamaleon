<?php
/*-----------------------------------------------------------------------------------*
@		SISTEMA DE GERENCIAMENTO DE CONTEÚDOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATRÍCULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Português - Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       © todos os direitos reservados desde 2007  
@       VERSÃO 1.0     								 
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
$pagina = "excluir_xml.php";
$diretorio = "1";
session_name("soordle_xamaleon");
session_start();
				include('../classes/var.php');
				$MJO->topo("$INCLUDE","$tema");
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");
				$linkRetornar = "<a class=\"link2\" href=\"$ROTA/modulos/mostra_cadastros.php?verifica=true\">$_VOLTAR</a>";
/*import_request_variables("pg");	*/
extract($_GET);
extract($_POST);
$qualArquivo = "$arquivo.xml";
print "<center>";
if($_SESSION["usuario"] != ""){
print "<center>";	
	montaMenu();
			$MJO->NOTB('width="753" class='.$COR1.'');
				$MJO->NTR('colspan="2" align="CENTER" vAlign="top" class='.$COR1.'');

			if (!file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo")){
			print "<b ID='destaque9'>$_ARQUIVO_INEXISTENTE</b><br/>$linkRetornar";
				$MJO->NCTB();
				print "<br/>";				
				$MJO->fim("$INCLUDE","$tema");
			exit;	
			}
	
    chdir("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/");
    $do = unlink($qualArquivo);
    if($do=="1"){
        echo "<b id='destaque9'>$_ARQUIVO_EXCLUIDO_SUCESSO</b><br/>$linkRetornar";
				$MJO->NCTB();
				print "<br/>";	
				$MJO->fim("$INCLUDE","$tema");
				exit;
    } else { 
	
	montaMenu();
	echo "$_ERRO_EXCLUIR_XML"; 
	include("$INCLUDE/temas/$tema/fim.php");
	} 
	print "</center>";
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$_ACESSO_NEGADO_MSG</div>";
} 
	

?>