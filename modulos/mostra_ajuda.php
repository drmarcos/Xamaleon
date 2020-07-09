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
session_name("soordle_xamaleon");
session_start();
$pagina = "ajuda.php";
$diretorio = "1";
include('../classes/var.php');
$MJO->topo("$INCLUDE","$tema");				
if($_SESSION["usuario"] != ""){
		print "<center>";
		montaMenu();
			$MJO->NOTB('class='.$COR1.' cellpadding="8" width="753"');
			$MJO->NTR('align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeMenuAjuda","","","","")." $_AJUDA</b>");
				$MJO->NCTR();				
				$conteudoAjuda = array();
				$conteudoAjuda[1] = "$_TEXTO_AJUDA_001";
				$conteudoAjuda[2] = "$_TEXTO_AJUDA_002";
				$conteudoAjuda[3] = "$_TEXTO_AJUDA_003";
				$conteudoAjuda[4] = "$_TEXTO_AJUDA_004";
				$MJO->arrayLinhas($conteudoAjuda);
				$MJO -> NCTB();
}else{
// BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";	
}
print "<br/>";
$MJO->fim("$INCLUDE","$tema");
?>