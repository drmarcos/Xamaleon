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
$diretorio = $repositorioArquivos;
	
$conteudo =<<<eof
<?xml version="1.0" encoding="UTF-8"?>

<!-- <!DOCTYPE MATRICULA [
  <!ELEMENT MATRICULA (IDENTIFICACAO,ESCOLARIDADE,NOME,EMAIL,SEXO,ENDERECO,CIDADE,BAIRRO,APROVADO)>
  <!ELEMENT IDENTIFICACAO    (#PCDATA)>
  <!ELEMENT ESCOLARIDADE    (#PCDATA)>
  <!ELEMENT NOME    (#PCDATA)>
  <!ELEMENT EMAIL    (#PCDATA)>
  <!ELEMENT ENDERECO    (#PCDATA)>
  <!ELEMENT BAIRRO    (#PCDATA)>
  <!ELEMENT CIDADE    (#PCDATA)>
  <!ELEMENT APROVADO   (#PCDATA)>

]> -->
<MATRICULA>
	<IDENTIFICACAO>$matricula</IDENTIFICACAO>
	<ESCOLARIDADE>$escolaridade</ESCOLARIDADE>
	<NOME>$nome</NOME>
	<EMAIL>$email</EMAIL>
	<SEXO>$sexo</SEXO>
	<ENDERECO>$endereco</ENDERECO>
	<BAIRRO>$bairro</BAIRRO>
	<CIDADE>$cidade</CIDADE>
	<APROVADO>$aprovado</APROVADO>
</MATRICULA>
<!-- by Oliveira M.J.N [Xamaleon v.0.1][soordle.org][eadgames.com.br] -->
eof;
?>