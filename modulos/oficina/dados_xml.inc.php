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
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//PT_BR" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- <!DOCTYPE MATRICULA [
  <!ELEMENT MATRICULA (IDENTIFICACAO,OFICINA,TELEFONE,RESPONSAVEL,ESCOLARIDADE,HORARIO,NOME,EMAIL,SEXO,NOME_DA_MAE,ENDERECO,CIDADE,BAIRRO,APROVADO)>
  <!ELEMENT TIPO     (#PCDATA)>
  <!ELEMENT IDENTIFICACAO    (#PCDATA)>
  <!ELEMENT OFICINA (#PCDATA)>
  <!ELEMENT TELEFONE    (#PCDATA)>
  <!ELEMENT RESPONSAVEL (#PCDATA)>
  <!ELEMENT ESCOLARIDADE    (#PCDATA)>
  <!ELEMENT HORARIO    (#PCDATA)>
  <!ELEMENT NOME    (#PCDATA)>
  <!ELEMENT EMAIL    (#PCDATA)>
  <!ELEMENT NOME_DA_MAE    (#PCDATA)>
  <!ELEMENT ENDERECO    (#PCDATA)>
  <!ELEMENT BAIRRO    (#PCDATA)>
  <!ELEMENT CIDADE    (#PCDATA)>
  <!ELEMENT APROVADO   (#PCDATA)>

]> -->
<MATRICULA>
	<IDENTIFICACAO>$matricula</IDENTIFICACAO>
	<APROVADO>$aprovado</APROVADO>
	<NOME>$nome</NOME>
	<EMAIL>$email</EMAIL>
	<SEXO>$sexo</SEXO>
	<OFICINA>
		<TIPO>$oficina</TIPO> 
	</OFICINA>
	<HORARIO>$horario</HORARIO>
	<RESPONSAVEL>$responsavel</RESPONSAVEL>
	<ESCOLARIDADE>$escolaridade</ESCOLARIDADE>
	<NOME_DA_MAE>$nome_mae</NOME_DA_MAE>
	<TELEFONE>$telefone</TELEFONE>
	<ENDERECO>$endereco</ENDERECO>
	<BAIRRO>$bairro</BAIRRO>
	<CIDADE>$cidade</CIDADE>
</MATRICULA>
<!-- by Oliveira M.J.N [Xamaleon v.0.1][soordle.org][eadgames.com.br] -->
eof;
?>