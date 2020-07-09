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
session_name("soordle_xamaleon");
session_start();
unset($pagina);
unset($diretorio);
$pagina = "gera_pdf";
$diretorio = "2";
/*import_request_variables("g");*/
extract($_GET);
extract($_POST);
				include('../../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");				
				include("$INCLUDE/modulos/$NomeModulo/classe_switch.php");
				$TROCA = new meuSwitch;
if($_SESSION["usuario"] != ""){		
print "<center>";
			montaMenu();
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="1" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo(''.$MJO->imagensTag("$CFG->iconeCMS","","48","48").'');
				$MJO->NCTB();	
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="1" align="left" vAlign="top" class='.$COR1.'');
					$o = new printConteudo('<b id="destaque5">'.$_BREVE.'!</b><br/><b id="destaque10">'.$_EXPORTAR." ".$_PARA_CMS.'</b>');
				$MJO->NCTR();	
				$MJO->NTR('colspan="1" align="center" vAlign="top" class='.$COR1.'');
					$MJO->imagensTag($recurso=''.$CFG->imagemErro404.'');
				$MJO->NCTB();	
				print "</center>";
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";
}
print "<br/>";
$MJO->fim($INCLUDE,$tema);		
?>