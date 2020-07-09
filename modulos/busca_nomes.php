<<?php
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
$pagina = "mostra_cadastros";
$diretorio = "1";

				include('../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
/*import_request_variables("g");*/	
extract($_GET);
extract($_POST);			
if($_SESSION["usuario"] != ""){
		if(!file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos")){
			print "<center>";
			montaMenu();
							$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeBusca","","","","")." $_BUSCA</b>");
				$MJO->NCTB();	
					$MJO->NOTB('width="100%"');

							$MJO->NOTB('class='.$COR1.' width="749"');
							$MJO->NTR('colspan="2" align="center" vAlign="top" class='.$COR1.'');
							print "<br/><br/><br/><br/><br/>";
							print "<b id='destaque1'>$_NENHUM_ARQUIVO_ENCONTRADO</b>";
							print "<br/><br/><br/><br/><br/>";
							$MJO->NCTB();
							$MJO->NCTB();
							print "<br/>";
						$MJO->fim($INCLUDE,$tema);
							exit;
	}else{
unset($_SESSION["nomesArquivos"]);
$diretorio_selecionado  = opendir("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos");
	while ($nome_itens = readdir($diretorio_selecionado)) {
    $itens[] = $nome_itens;
	}
	sort($itens);
	foreach ($itens as $listar) {
		   if ($listar!="." && $listar!=".."){ 		
		   		if (is_dir($listar)) { 		
					$pastas[]=$listar; 
				} else{ 		
					$arquivos[]=$listar;
				}
		   }
	}
	if ($arquivos != "") {
		print "<center>";
		montaMenu();
			$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeBusca","","","","")." $_BUSCA</b>");
				$MJO->NCTB();		
		
/* -- [ BUSCAR ARQUIVOS POR APROVADOS ] --*/

		$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
		$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR5.'');
			$o = new printConteudo('<b id="destaque3"><a class="link2" href="busca_nomes.php?buscaAprovados="1"&verifica=true">'.$_APROVADOS.'</a></b>');
		$MJO->NCTB();

/* -- [ BUSCAR ARQUIVOS PELO NOME ] --*/

$arr_alfa = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
		$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
		$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR4.'');
			$o = new printConteudo('<b id="destaque3"><a class="link2" href="busca_nomes.php?verifica=true">'.$_TODOS.'</a></b>');
			$MJO->NCTB();
		$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
		$MJO->NTR('colspan="2" align="right" vAlign="top" class='.$COR4.'');
		
foreach( $arr_alfa as $chave => $letra ){
			$o = new printConteudo('<b id="destaque3"><a class="link2" href="busca_nomes.php?buscaLetra='.$letra.'&verifica=true">'.$letra.'</a></b>');
        if( $chave < count($arr_alfa)-1 )
                echo " |";
		}
		$MJO->NCTB();
			
/* -- [ // BUSCAR POR NOMES ] -- */	
		
		$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
			$MJO->NTR('class='.$COR1.'');
			print "<dl>";
		foreach($arquivos as $listar){
		
				if ($listar != "index.html") {
   				$xml = simplexml_load_file("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$listar");
				}
				if($listar != "index.html"){
					
				
			if(isset($_GET["buscaLetra"])){
							
				$primeiraLetra = substr("$xml->NOME",0,1);
				$primeiraLetra = strtoupper($primeiraLetra);
						
				if($primeiraLetra == $buscaLetra){

				$letraAtual = $primeiraLetra;
				if(!isset($letraAnterior)){
					$letraAnterior = "";
				}

					if($letraAtual != $letraAnterior){						
					echo "<p align=\"center\"><b id=\"destaque5\">".$primeiraLetra."</b></p>";
					}
/* -- [ CORES ALTERNADAS NAS LINHAS ] -- */				
				if(!isset($totalResultados)){
					$totalResultados = "";
				}
				$totalResultados++;
				for ($b = $totalResultados; $b <= $totalResultados; $b++) {
						if($b % 2 == 0)
						{
						$estilo = $COR6;
						}
						else
						{
						$estilo = $COR7;
						} 
				}
/* ------------------------------------- */						
   				print " <dd class=\"$estilo\"><a class='link2' href=\"$ROTA/modulos/$NomeModulo/recebelista_nomesarquivos.php?totalArquivos=1&nomesArquivos=$listar#\">";
					print $xml->NOME;					
				}
				if(!isset($letraAtual)){
					$letraAtual = "";
				}				
				$letraAnterior = $letraAtual;
			}elseif(isset($_GET["buscaAprovados"])){
				if(!isset($listarAnterior)){
					$listarAnterior = "";
				}
				if($xml->APROVADO == "1"){

/* -- [ CORES ALTERNADAS NAS LINHAS ] -- */				
				if(!isset($totalResultados)){
					$totalResultados = "";
				}
				$totalResultados++;
				for ($b = $totalResultados; $b <= $totalResultados; $b++) {
						if($b % 2 == 0)
						{
						$estilo = $COR7;
						}
						else
						{
						$estilo = $COR6;
						} 
				}
/* ------------------------------------- */

				$aprovadoAtual = $_APROVADOS;
				if(!isset($aprovadoAnterior)){
					$aprovadoAnterior = "";
				}				
					if($aprovadoAtual != $aprovadoAnterior){						
					echo "<p align=\"center\"><b id=\"destaque5\">".$aprovadoAtual."</b></p>";
					}
			
   				print " <dd class=\"$estilo\"><a class='link2' href=\"$ROTA/modulos/$NomeModulo/recebelista_nomesarquivos.php?totalArquivos=1&nomesArquivos=$listar#\">";
					print $xml->NOME." [ $listar]";					
					
				}
				if(!isset($aprovadoAtual)){
					$aprovadoAtual = "";
				}				
				$aprovadoAnterior = $aprovadoAtual;
			}else{
			
/* -- [ CORES ALTERNADAS NAS LINHAS ] -- */				
				if(!isset($totalResultados)){
					$totalResultados = "";
				}
				$totalResultados++;
				for ($b = $totalResultados; $b <= $totalResultados; $b++) {
						if($b % 2 == 0)
						{
						$estilo = $COR6;
						}
						else
						{
						$estilo = $COR7;
						} 
				}
/* ------------------------------------- */	
									
				echo "<dd class=\"$estilo\"><a class='link2' href=\"$ROTA/modulos/$NomeModulo/recebelista_nomesarquivos.php?totalArquivos=1&nomesArquivos=$listar#\">".$xml->NOME."</a>";
			}
   			print"</a></dd>";				
			}
			}
   		}
			print "</dl>";
			$MJO->NCTR();
		$MJO->NCTB();	  
   					
}
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";
}
print "<br/>";
$MJO->fim($INCLUDE,$tema);
?>