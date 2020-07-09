<?php
/*-----------------------------------------------------------------------------------*
@		SISTEMA DE GERENCIAMENTO DE CONTEÚDOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATRÍCULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Português- Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       ® todos os direitos reservados desde 2007  
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
include("classes/biblioteca.php");
include("classes/lib_html.php");
include("classes/forms.inc.php");	
$FORM = new Form;
$F = new Newform;
$MJO = new montaHtml;

ini_set('default_charset','UTF-8');	
$charset = "UTF-8";
print"<html><meta content=\"\">
<meta charset=\"$charset\">
<title>XAMALEON v.0.1 [by Soordle] Instalador</title>
<head><link rel=\"stylesheet\" type=\"text/css\" href=\"temas/pantanal/css.css\">
</head>
<body><center>";
print "<div class=\"corpo\">";
include("includes/form_instalacao.inc.php");
print "</div></center>";
?>