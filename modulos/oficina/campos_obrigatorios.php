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
function avisoCampos($textoExibir){
global $COR1,$COR8,$_VOLTAR,$MJO,$INCLUDE,$tema;
			print "<div id=\"campoObrigatorio\">";
				$MJO->NOTB('class='.$COR1.' width="753"');
				$MJO->NTR('align="left" COLSPAN="3" vAlign="top" class='.$COR8.'');
					$o = new printConteudo('<P ALIGN="CENTER"><b>'.$textoExibir.'</b></p><P ALIGN="CENTER"><a CLASS="link1" href="javascript:history.back();"><b id="destaque5">'.$_VOLTAR.'</b></a>');
				$MJO->NCTB();
			print "</div>";	
			$MJO->fim($INCLUDE,$tema);	
			return;
}
		if($nome == ""){
			avisoCampos($_PRECISA_NOME_MATRICULAR);
			exit;
		}elseif($email == ""){
			avisoCampos($_PRECISA_EMAIL_MATRICULAR);
			exit;
		}else{
		}
?>