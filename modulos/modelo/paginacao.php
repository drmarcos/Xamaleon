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
session_name("soordle_xamaleon");
session_start();
unset($pagina);
unset($diretorio);
$pagina = "paginacao";
$diretorio = "2";
/*import_request_variables("pg");	*/
extract($_GET);
extract($_POST);
				include('../../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");				
				include("$INCLUDE/modulos/$NomeModulo/classe_switch.php");
				$TROCA = new meuSwitch;

						$pasta  = "$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos";
		print "<center>";
if (file_exists("$pasta")) {
    $arquivo    = glob("../../arquivos_xml/$NomeModulo/$repositorioArquivos/*.xml*");
    $qtd        = $numeroRegistrosPaginaRelatorio;
    $atual      = (isset($_GET['pg'])) ? intval($_GET['pg']) : 1;
    $pagArquivo = array_chunk($arquivo, $qtd);
    $contar     = count($pagArquivo);
	if($contar != "0"){
		
    $resultado  = $pagArquivo[$atual-1];
	}

						$handle = opendir($pasta);
						
						$files = 0;
						
						while (false !== ($file = readdir($handle)))
						{
						if ($file != "index.html") {
							if ($file != "." && $file != ".." && !(is_dir($pasta . $file))) {
							  $files++;
							}
							}
						}
					
		montaMenu();
			$MJO->NOTB('class='.$COR1.' width="753"');
				$MJO->NTR("","","","#000000","","RIGHT","top","$COR3","","$COR3","$COR3");
				$o = new printConteudo("<b ID='destaque5'>$_PASSO_UM</b><br/>$_FORAM_ENCONTRADOS_TOTAL <b id='destaque9'>$files</b> $_ARQUIVOS <b id='destaque11'>[ $repositorioArquivos ]</b>");
			$MJO->NCTB();
if($files == "0"){
	print $_NENHUM_ARQUIVO_ENCONTRADO;
						$MJO->NCTR();
		$MJO->NCTB();
		print "<br/>";
$MJO->fim($INCLUDE,$tema);	
exit;
}
	

/* -- [ BUSCAR ARQUIVOS PELO NOME ] --*/
									
			$MJO->NOTB('class='.$COR1.' width="753"');
				$MJO->NTR('colspan="2" align="right" vAlign="top" class='.$COR6.'');
					$o = new printConteudo('<b id="destaque5"><a class="link2" href="'.$ROTA.'/modulos/busca_nomes.php?verifica=true">'.$_BUSCA_NOMES.'</a></b>');
				$MJO->NCTR();
		
/* -- [ // BUSCAR POR NOMES ] -- */	

/* -- [ BUSCAR ARQUIVOS POR APROVADOS ] --*/

				$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo('<b id="destaque3"><a class="link2" href="'.$ROTA.'/modulos/busca_nomes.php?buscaAprovados="1"&verifica=true">'.$_APROVADOS.'</a></b>');
				$MJO->NCTR();

/* -- [ BUSCAR ARQUIVOS POR LETRA ] --*/

				$MJO->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR5.'');
				
				$arr_alfa = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z");
				foreach( $arr_alfa as $chave => $letra ){
					$o = new printConteudo('<b id="destaque3"><a class="link2" href="'.$ROTA.'/modulos/busca_nomes.php?buscaLetra='.$letra.'&verifica=true">'.$letra.'</a></b>');
        			if( $chave < count($arr_alfa)-1 )
                	echo " | ";
				}
				$MJO->NCTR();
							
			$MJO->NOTB('class='.$COR1.' cellspacing="0" width="753"');
				$MJO->NTR("","","","#000000","","RIGHT","top","$COR3","","$COR3","$COR3");


        for($i = 1; $i <= $contar; $i++){
            if($i ==  $atual){
                printf('<a class="linkMenu" href="#"><b id="destaque3">[ %s ]</b></a>', $i);
            }else{
                printf('<a class="linkMenu" href="?pg=%s"><b id="destaque4"> %s </b></a>', $i, $i);
            }
        }		
        
			$MJO->NCTR();
		
/* -------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------- */

        foreach($resultado as $valor){
					if($valor != "../arquivos_xml/$NomeModulo/$repositorioArquivos/index.html"){
				if (file_exists("$valor")) {
				$xml = simplexml_load_file("$valor"); 
			
					$p_cnt = count($xml->NOME);
					$MJO->NTR('class="'.$COR4.'"');
							$o = new printConteudo("<b id=\"destaque2\">$_MATRICULA</b>");
					$MJO->NTD('class="'.$COR4.'"');
							$o = new printConteudo("<b id='destaque2'>".$xml->IDENTIFICACAO."</b>");							
					$MJO->NTR();
							$o = new printConteudo($_APROVADO);									
							print "</TD><TD><b id='destaque7'>";
							$aprovadoCadastrado = $xml->APROVADO;
							$TROCA->mostraAprovado($aprovadoCadastrado);
						print "</b></TD></TR>";
					if($xml->NOME != "")					
							$o = new printConteudo($_NOME,"<b id='destaque5'>".$xml->NOME."</b>");					
					if($xml->EMAIL != "")
							$o = new printConteudo($_EMAIL,$xml->EMAIL);							
					if($xml->ESCOLARIDADE != "")
					$MJO->NTR();
							$o = new printConteudo($_ESCOLARIDADE);									
							print "</TD><TD><b id='destaque10'>";
						$escolaridadeCadastrada = $xml->ESCOLARIDADE;	
						$TROCA->mostraEscolaridade($escolaridadeCadastrada);
						
					if($xml->SEXO != "")
					$MJO->NTR();
							$o = new printConteudo($_SEXO);									
							print "</TD><TD>";
						$sexoCadastrado = $xml->SEXO;					
						$TROCA->mostraSexo($sexoCadastrado);							
						print "</b></TD></TR>";				
					if($xml->CIDADE != "")
							$o = new printConteudo($_CIDADE,$xml->CIDADE);																											
					if($xml->BAIRRO != "")
							$o = new printConteudo($_BAIRRO,$xml->BAIRRO);							
					if($xml->ENDERECO != "")
							$o = new printConteudo($_ENDERECO,$xml->ENDERECO);							
												
			$MJO->NTR('align="right" COLSPAN="2" vAlign="top" class='.$COR6.'');
				$MJO->imagensTagLink("$ROTA/modulos/$NomeModulo/editar_xml.php?arquivo=$xml->IDENTIFICACAO","","$_EDITAR","$CFG->iconeEditar","$_EDITAR","16","16");
				$MJO->imagensTagLink("$ROTA/modulos/excluir_xml.php?arquivo=$xml->IDENTIFICACAO","","$_EXCLUIR","$CFG->iconeExcluir","$_EXCLUIR","16","16");													
		}
        }
        
					$MJO->NCTR();					
		}
/* -------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------- */
				$MJO->NTR("","","","#000000","","RIGHT","top","$COR3","","$COR3","$COR3");
		
		        for($i = 1; $i <= $contar; $i++){
		            if($i ==  $atual){
		                printf('<a class="linkMenu" href="#"><b id="destaque3">[ %s ]</b></a>', $i);
		            }else{
		                printf('<a class="linkMenu" href="?pg=%s"> <b id="destaque4"> %s </b> </a>', $i, $i);
		            }
		        }
			$MJO->NCTB();
			
print "<br/>";
$MJO->fim($INCLUDE,$tema);
}else{
			montaMenu();
			$MJO->NOTB('class='.$COR1.'');
				$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR1.'');
				
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
					$MJO->NCTR();
		$MJO->NCTB();
		print "<br/>";
$MJO->fim($INCLUDE,$tema);	
}
?>