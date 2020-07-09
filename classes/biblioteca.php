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
class montaHtml{

	public function topo($caminho,$tema){
	global $MJO,$CFG,$ROTA,$META_TAGS,$COR1,$COR2,$COR3,$COR4,$COR5,$COR6,$COPY;
		include("$caminho/temas/$tema/topo.php");
		return;
	}
	public function fim($caminho,$tema){
	global $MJO,$CFG,$COR1,$COR2,$COR3,$COPY;
		include("$caminho/temas/$tema/fim.php");
		return;
	}

	public function abreUL($classe='')
	{
		print "\t<ul class=\"$classe\">\n";
	}
	function montaLI($valorLI)
	{
		print "\t\t<li>$valorLI</li>\n";
	}
	function fechaUL()
	{
		print "\t</ul>\n";
	}
	
/* -- [ TABELA ] -- */	

	public function NOTB($vars='')
	{
		print "\n\t<TABLE $vars>\n";
	}

	public function NTR($varsTd='')
	{
		print "\t<TR>\n\t\t<TD $varsTd>\n";
	}
	public function NTD($varsTd='')
	{
		print "\t</TD>\n\t<TD $varsTd>\n";
	}
	public function NCTR()
	{
		print "\t\t</TD>\n\t</TR>\n";
	}	
	public function NCTB()
	{
		print "\t\t</TD>\n\t</TR>\n</TABLE>\n";
	}

		function NHR($var){
			$this->NTR($var);
			print "<hr></hr>";
			$this->NCTR();
		}	
	function ajuda2 ($id,$id_pagina,$valor,$src,$alt,$caption){
		print"<a class=link href=\"#\"\"javascript:void(0);\" onmouseover=\"return overlib('$valor', WIDTH, 250, CAPTION, '$caption',SHADOW, SHADOWCOLOR,'#313131','Shadow')\" onmouseout=\"return nd();\">
		<img src=\"$src\" border=\"0\" alt=\"$alt\" valign=\"middle\"></A>";								
	}
	function imagensTag($recurso='',$titulo='',$largura='',$altura='',$borda='0'){
		print "<img src=\"$recurso\" title='$titulo' width='$largura' height='$altura' border='$borda'>\n";
		return;
	}
	function imagensTagLink($link,$target,$tituloLink,$recurso='',$titulo='',$largura='',$altura='',$borda='0'){
		print "<a href=\"$link\" target=\"$target\" title=\"$tituloLink\"><img src=\"$recurso\" title='$titulo' width='$largura' height='$altura' border='$borda'></a>\n";
		return;
	}	
/* -- [ LINHA COM ARRAY PARA CELULAS ] -- */

	function arrayCelulas($meuTexto){					
		
		print "<tr>\n";	
		$colunasLength = count($meuTexto);
		for($i=1;$i<=$colunasLength;$i++)
		{
			print"<td>\n$meuTexto[$i]\n</td>\n";
		}
		print "</tr>\n";
	}
	function arrayLinhas($meuTextoLinha){						
		$linhaLength = count($meuTextoLinha);
		for($i=1;$i<=$linhaLength;$i++)
		{
			print"<tr>\n<td>\n$meuTextoLinha[$i]\n</td>\n</tr>\n<tr>\n<td>\n<hr></hr>\n</td>\n</tr>\n";
		}
	}
		function MTD ($var){
					$ue = base64_decode($var);
					$va = base64_decode($ue);
					print $va; 
			return;
		}
		function MTR ($var){
						$ue = base64_encode($var);
						$va = base64_encode($ue); 
				return ($va);
			}			
	
}
/* -- [ FECHA CLASSE HTML ] -- */

class printConteudo extends montaHtml
{
   public function __construct()
    {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this,$f='__construct'.$i)) {
            call_user_func_array(array($this,$f),$a);
        }
    }
   
    function __construct1($a1)
    {
			echo($a1.PHP_EOL);
    }
   
    function __construct2($a1,$a2)
    {
			global $COR7;
			$this->NTR('class="'.$COR7.'"');
				print($a1.PHP_EOL);
			$this->NTD('class="'.$COR7.'"');
				print($a2.PHP_EOL);
			$this->NCTR();		
    }
   
    function __construct3($a1,$a2,$a3)
    {
        $this->abreUL("mais");
			$this->montaLI($a1.PHP_EOL);
			$this->montaLI($a2.PHP_EOL);
			$this->montaLI($a3.PHP_EOL);
		$this->fechaUL();        
    }

}
/* -- [ FECHA CLASSE printConteudo ] -- */

class inclusao{
		
	function moduloOverlib($caminho){
		print "<script type='text/javascript' src='$caminho/includes/overlib/overlib.js'></script>
		<script type='text/javascript' src='$caminho/includes/overlib/overlib_shadow.js'></script>
		<div id='overDiv' style='position:absolute; visibility:hidden; z-index:1000;'></div>";
		}
			
}
/* -- [ FECHA CLASSE inclusao ] -- */

class menu extends montaHtml{
	function menuExportacao($meuTexto){
	global $COR5,$CFG,$_EXPORTAR,$totalArquivos;
				$this->NOTB();
				$this->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR5.'');
					$o = new printConteudo('<b id="destaque3"><a class="link2" href="../busca_nomes.php?buscaAprovados="1"&verifica=true">'.$_EXPORTAR.'</b>');
		$colunasLength = count($meuTexto);
		for($i=1;$i<=$colunasLength;$i++)
		{
			print"<td>\n$meuTexto[$i]\n</td>\n";
		}

				$this->NCTB();		
	}
}
/* -- [ FECHA CLASSE menu ] -- */
/* -------------------------------------------------------------------- */

function buscaArquivosXml($dir, $tipos = null){
      if(file_exists($dir)){
          $dh =  opendir($dir);
          while (false !== ($filename = readdir($dh))) {
              if($filename != '.' && $filename != '..'){
                  if(is_array($tipos)){
                      $extensao = get_extensao_file($filename);
                      if(in_array($extensao, $tipos)){
                          $files[] = $filename;
                      }
                  }
                  else{
                      $files[] = $filename;
                  }
              }
          }
          if(is_array($files)){
              sort($files);
          }
          return $files;
      }
      else{
          return false;
      }
}
/* -------------------------------------------------------------------- */
	class menuIdioma{
		
					function mLink($var1){
						$vLink ="<a href=\"?lang=$var1\">";
						return $vLink;
					}
					function mImg($var1,$var2){
						$vImg = "<img src=\"imagens/icones/$var1.png\" border=\"0\" title=\"$var2\"></a>";
						return $vImg;
					}
					function arrayCelulas($meuTexto){						
						$colunasLength = count($meuTexto);
						for($i=1;$i<=$colunasLength;$i++)
						{
							print"$meuTexto[$i]";
						}
					}	
	} 
	class banners{
		
					function mLink($var1){
						$vLink ='<a href='.$var1.' target="_blank">';
						return $vLink;
					}
					function mImg($var1,$var2){
						$vImg = "<img src=\"imagens/$var1.png\" border=\"0\" title=\"$var2\"></a>";
						return $vImg;
					}
	} 
		
	function corrigeleitura($nomeCampo){
	$utf8 = $nomeCampo;
	$iso88591_1 = utf8_decode($utf8);
	$iso88591_2 = iconv('UTF-8', 'ISO-8859-1', $utf8);
	$nomeCampo = mb_convert_encoding($utf8, 'ISO-8859-1', 'UTF-8');
	return $nomeCampo;						
}
	function corrigeleituraPDF($nomeCampo){
	$iso88591 = $nomeCampo;
//$iso88591 = 'ÄÖÜ'; // file must be ISO-8859-1 encoded
	$utf8_1 = utf8_encode($iso88591);
	$utf8_2 = iconv('ISO-8859-1', 'UTF-8', $iso88591);
	$utf8_2 = mb_convert_encoding($iso88591, 'UTF-8', 'ISO-8859-1');
	return $nomeCampo;						
}	
?>