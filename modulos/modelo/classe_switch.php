<?php
/*-----------------------------------------------------------------------------------*
@       NÃO REMOVA AS INFORMÇÕES A SEGUIR
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
class meuSwitch{


	function mostraSexo($sexoCadastrado){
		global $_MASCULINO,$_FEMININO;
							switch ($sexoCadastrado){
							case 0:
								print $_MASCULINO;
								break;
							case 1:
								print $_FEMININO;
								break;
							}	
	
	}

	function mostraEscolaridade($escolaridadeCadastrada){
		global $_ANALFABETO,$_PRIMARIO_INCOMPLETO,$_PRIMARIO_COMPLETO,$_GINASIO_INCOMPLETO,$_GINASIO_COMPLETO,$_SEG_GRAU_INCOMPLETO_AC,
$_SEG_GRAU_COMPLETO_AC,$_SEG_GRAU_INCOMPLETO_TC,$_SEG_GRAU_COMPLETO_TC,$_TERC_GRAU_INCOMPLETO,$_TERC_GRAU_COMPLETO,$_POS_CURSANDO,
$_POS_CONCLUIDO,$_MESTRADO_CURSANDO,$_MESTRADO_CONCLUIDO,$_DOUTORADO_CURSANDO,$_DOUTORADO_CONCLUIDO,$_MBA_CURSANDO,$_MBA_CONCLUIDO;		
							switch ($escolaridadeCadastrada){
							case 0:
								print $_ANALFABETO;
								break;
							case 1:
								print $_PRIMARIO_INCOMPLETO;
								break;
							case 2:
								print $_PRIMARIO_COMPLETO;
								break;
							case 3:
								print $_GINASIO_INCOMPLETO;
								break;
							case 4:
								print $_GINASIO_COMPLETO;
								break;
							case 5:
								print $_SEG_GRAU_INCOMPLETO_AC;
								break;
							case 6:
								print $_SEG_GRAU_COMPLETO_AC;
								break;
							case 7:
								print $_SEG_GRAU_INCOMPLETO_TC;
								break;
							case 8:
								print $_SEG_GRAU_COMPLETO_TC;
								break;
							case 9:
								print $_TERC_GRAU_INCOMPLETO;
								break;
							case 10:
								print $_TERC_GRAU_COMPLETO;
								break;
							case 11:
								print $_POS_CURSANDO;
								break;
							case 12:
								print $_POS_CONCLUIDO;
								break;
							case 13:
								print $_MESTRADO_CURSANDO;
								break;
							case 14:
								print $_MESTRADO_CONCLUIDO;
								break;
							case 15:
								print $_DOUTORADO_CURSANDO;
								break;
							case 16:
								print $_DOUTORADO_CONCLUIDO;
								break;
							case 17:
								print $_MBA_CURSANDO;
								break;
							case 18:
								print $_MBA_CONCLUIDO;
								break;
							}	
	
	}

	function mostraAprovado($aprovadoCadastrado){
		global $_SIM,$_NAO;
							switch ($aprovadoCadastrado){
							case 0:
								print $_NAO;
								break;
							case 1:
								print $_SIM;
								break;
							}	
	
	}								
}	
?>