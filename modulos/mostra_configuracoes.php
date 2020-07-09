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
session_name("soordle_xamaleon");
session_start();
unset($pagina);
unset($diretorio);
$pagina = "mostra_configuracoes.php";
$diretorio = "1";
				include('../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
				$INC = new inclusao;
				$INC->moduloOverlib($ROTA);
				
/*import_request_variables("gp");	*/	
extract($_GET);
extract($_POST);		
if($_SESSION["usuario"] != ""){
		print "<center>";
		montaMenu();

/* -- [ VERSÏ DE DEMONSTRAǃO ] -- */

	if($VersaoDemo == "1"){
			$classeInput = "inputDesabilitado";
			$desabilitar = "disabled";
			$_TITULO_DESABILITADO = "$_TEXTO_TITULO_DESABILITADO";
		}else{
			$classeInput = "input";
			$desabilitar = "";
			$_TITULO_DESABILITADO = "";
	}
			
	$FORM->abreForm("$pagina","POST","cad","cad","");
			$MJO->NOTB('class='.$COR1.' border="0" cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeMenuConfig","","","","")." $_CONFIGURACOES</b>");
				$MJO->NCTR();

/* -- [ MENSAGEM DE ALTERAǃO ] -- */
				
	if(isset($_POST["alterar"])){
					$MJO->NTR('class='.$COR7.' colspan="3" align="LEFT"');
					$MJO->NOTB('class='.$COR1.' width="100%"');			
						$MJO->NTR('class='.$COR10.' align="center"');						
							$o = new printConteudo('<b>'.$_DADOS_CADASTRADOS_SUCESSO. '</b>');
					$MJO->NCTB();	
				$MJO->NCTR();
	}				
				$FORM->mostraInput2("hidden","","alterar","true","255","");
				
				$classeLinha1 = "class =\"$COR1\"";
				$classeLinha2 = "class =\"$COR7\"";
				
/* -- [ CAMPOS NOME DA EMPRESA E EMAIL ] -- */
			
				$F->inputTD('colspan="3"',$classeLinha2,'<b id="destaque5">'.$_NOME_DA_EMPRESA.'</b>','<b id="destaque5">'.$_EMAIL.'</b>',$classeLinha2,'TYPE="TEXT" name="nomeEmpresaTrocado" value="'.$EMPRESA_NOME.'" size="30"','TYPE="TEXT" name="emailTrocado" value="'.$AUTOR1_Email.'" size="30"',$_DICA_NOME_EMPRESA,$_DICA_EMAIL,$CFG->iconeAjuda,$_NOME_DA_EMPRESA,$_EMAIL);				
				
/* -- [ CAMPOS USUARIO E SENHA ] -- */
				
				$F->inputTD('colspan="3"',$classeLinha1,'<b id="destaque5">'.$_USUARIO.'</b>','<b id="destaque5">'.$_SENHA.'</b>',$classeLinha1,'TYPE="TEXT" CLASS='.$classeInput.' '.$desabilitar.' TITLE="'.$_DADO_CRIPTOGRAFADO.$usuarioGravado."\n".$_TITULO_DESABILITADO.'" name="usuarioGravadoTrocado" value="" size="20"','TYPE="TEXT" CLASS='.$classeInput.' '.$desabilitar.' TITLE="'.$_DADO_CRIPTOGRAFADO.$SenhaGravada."\n".$_TITULO_DESABILITADO.'" name="senhaGravadaTrocada" value="" size="20"',$_DICA_USUARIO,$_DICA_SENHA,$CFG->iconeAjuda,$_USUARIO,$_SENHA);				
				if($VersaoDemo == "1"){
				$F->inputTD('colspan="3"',"",'','',"",'TYPE="hidden" name="usuarioGravadoTrocado" value=""','TYPE="hidden" name="senhaGravadaTrocada" value=""',"","","","");
				}
				$MJO->NHR('colspan="3" class='.$COR7.'');								

/* -- [ MODULOS ] -- */
	
/* -- [ VERFICAMOS SE EXISTE O DIRETӒIO DO MӄULO ] -- */

				if(!file_exists("$INCLUDE/modulos/$NomeModulo/form_cadastro.php")){					
				$MJO->NTR('align="left" COLSPAN="3" vAlign="top" class='.$COR8.'');					
				$o = new printConteudo('<b>'.$_PARECE_HAVER_PROBLEMA_AQUI.'</b>&nbsp;<b id="destaque14">'.$_FALTA_DIRETORIO_MODULO.'</b>');
				$MJO->NCTR();
				}
				
/* -- [ MOSTRAMOS OS MӄULOS EXISTENTES ] -- */	

				$mOd = opendir("../modulos");
				while ($nome_itens = readdir($mOd)) {
				    $itensMod[] = $nome_itens;
				}
				sort($itensMod); 
				foreach ($itensMod as $listarMod) {
				   if ($listarMod!="." && $listarMod!=".." && $listarMod!="index.html"){ 
				   		if (is_dir($listarMod)) { 
							$pastasMod[]=$listarMod; 
						} else{ 
							$arquivosMod[]=$listarMod;
						}
				   }
				}

				if ($pastasMod != "") {
				$MJO->NTR('align="LEFT" vAlign="top" class='.$COR7.'');
				$o = new printConteudo(" <b id='destaque5'>$_MODULO</b>");
				$MJO->NTD('align="left" class='.$COR7.'');									
					print "<select name=\"NomeModuloTrocado\"><option value=\"$NomeModulo\">$NomeModulo</option>";
					foreach($pastasMod as $listarMod){
   					print "<option value=\"$listarMod\">$listarMod</option>";
   					}
					print "</select>";
				$MJO->NTD('align="left" class='.$COR7.'');
				$F->ajuda2 ("","",$_DICA_CAMPO_MODULO,$CFG->iconeAjuda,$_MODULO,$_MODULO);									
				$MJO->NCTR();
  				 }

								
				if ($pastasMod != "") {
				$MJO->NTR('align="left" COLSPAN="3" vAlign="top" class='.$COR7.'');
				$o = new printConteudo(" <b id='destaque10'>$_MODULOS_ATUAIS</b>");
				foreach($pastasMod as $listarMod){
				if($listarMod == $NomeModulo){
					$destaque = "destaque8";
				}else{
					$destaque = "destaque3";
				}
				print "<b id=\"$destaque\">[ ".$listarMod."&nbsp;]</b>";
				}
				$MJO->NCTR();
				}												
/* -- [ VAMOS BUSCAR TODOS OS DIRETORIOS DE IDIOMAS ] -- */				

				$id  = opendir("../idiomas/");
				$totIdiomas =0;
				while ($nomeIdiomas = readdir($id)) {
				    $ITENSID[] = $nomeIdiomas;
					if ($nomeIdiomas != "." && $nomeIdiomas != ".." && $nomeIdiomas != "index.html" && !(is_dir($nomeIdiomas))) {
 						 $totIdiomas++;
						} 					
				}
				sort($ITENSID); 
				foreach ($ITENSID as $LISTARID) {
				   if ($LISTARID!="." && $LISTARID!=".." && $LISTARID != "index.html"){ 
				   		if (is_dir($LISTARID)) { 
							$PASTASID[]=$LISTARID; 
						} else{ 
							$ARQUIVOSID[]=$LISTARID;
						}
				   }
				}				
				
				function selectDiretorioIdiomas($ARQUIVOSID){
					global $MJO,$CFG,$COR1,$COR7,$_IDIOMAS_ATUAIS,$_IDIOMA,$_DICA_CAMPO_IDIOMA,$idioma,$LISTARID;

								if ($ARQUIVOSID != "") {								
									$MJO->NTR('align="LEFT"  vAlign="top" class='.$COR1.'');
									$o = new printConteudo(" <b id='destaque5'>$_IDIOMA</b>");
									$MJO->NTD('align="left" class='.$COR1.'');
									print "<select name=\"idiomaTrocado\"><option value=\"$idioma\" selected>$idioma</option>";
								foreach($ARQUIVOSID as $LISTARID){
								switch($LISTARID){
									case "pt_br":
									$nomeIdoma = "Português- Brasil [pt_br]";
									break;
									case "de_de":
									$nomeIdoma = "Alemão[de_de]";
									break;
									case "en_gb":
									$nomeIdoma = "Inglês Gran Bretanha [en_gb]";
									break;
									case "en_us":
									$nomeIdoma = "Inglês EUA [en_us]";
									break;
									case "es_es":
									$nomeIdoma = "Espanhol - Espanha [es_es]";
									break;
									case "fr_fr":
									$nomeIdoma = "Francês [fr_fr]";
									break;
									case "fi_fi":
									$nomeIdoma = "Finlandês [fi_fi]";
									break;
									case "it_it":
									$nomeIdoma = "Italiano [it_it]";
									break;					
								}								
									print "<option style=\"padding-left: 20px;background:#fff url($CFG->caminhoIcones/$LISTARID.png) no-repeat;\" value=\"$LISTARID\">$nomeIdoma</option>";
								}
								print "</select> ";
								}
				}							
				selectDiretorioIdiomas($ARQUIVOSID);
				$MJO->NTD('align="left" class='.$COR1.'');
				$F->ajuda2 ("","",$_DICA_CAMPO_IDIOMA,$CFG->iconeAjuda,$_IDIOMA,$_IDIOMA);								
				$MJO->NCTR();			
				if ($ARQUIVOSID != "") {
				$MJO->NTR('align="LEFT" COLSPAN="3" vAlign="top" class='.$COR1.'');
				$o = new printConteudo(" <b id='destaque10'>$_IDIOMAS_ATUAIS</b>");
				
				foreach($ARQUIVOSID as $LISTARID){
					if($LISTARID == $idioma){
						$destaque = "destaque8";
					}else{
						$destaque = "destaque3";
					}
					$MJO->imagensTag("$CFG->caminhoIcones/$LISTARID.png");
					print "<b id=\"$destaque\">".$LISTARID."</b>";				
				}
				$MJO->NCTR();
				}
								
	
/* -- [ TEMAS ] -- */

				$ponteiro  = opendir("../temas");
				while ($nome_itens = readdir($ponteiro)) {
				    $itens[] = $nome_itens;
				}
				sort($itens); 
				foreach ($itens as $listar) {
				   if ($listar!="." && $listar!=".." && $listar!="index.html"){ 
				   		if (is_dir($listar)) { 
							$pastas[]=$listar; 
						} else{ 
							$arquivos[]=$listar;
						}
				   }
				}


				if ($arquivos != "") {
				$MJO->NTR('align="LEFT" vAlign="top" class='.$COR7.'');
				$o = new printConteudo(" <b id='destaque5'>$_TEMA</b>");
				$MJO->NTD('align="left" class='.$COR7.'');									
					print "<select name=\"temaTrocado\"><option value=\"$tema\">$tema</option>";
					foreach($arquivos as $listar){
   					print "<option value=\"$listar\">$listar</option>";
   					}
					print "</select>";
				$MJO->NTD('align="left" class='.$COR7.'');
				$F->ajuda2 ("","",$_DICA_CAMPO_TEMA,$CFG->iconeAjuda,$_TEMA,$_TEMA);									
				$MJO->NCTR();
  				 }
				 
/* -- [ VAMOS LISTAR OS DIRETORIOS (REPOSITӒIOS) EXISTENTES ] -- */

				if(!file_exists("../$CFG->caminhoArquivosXML/")){					
				$MJO->NTR('align="left" COLSPAN="3" vAlign="top" class='.$COR9.'');
				$o = new printConteudo('<b>'.$_PARECE_HAVER_PROBLEMA_AQUI.'</b><br/><B ID="destaque14">'.$_FALTA_DIRETORIO_REPOSITORIO.'</b>');
				$MJO->NCTR();
				}else{
					
				$d  = opendir("../$CFG->caminhoArquivosXML/");
				while ($nomeItens = readdir($d)) {
				    $ITENS[] = $nomeItens;
				}
				sort($ITENS); 
				foreach ($ITENS as $LISTAR) {
				   if ($LISTAR!="." && $LISTAR!=".." && $LISTAR!="index.html"){ 
				   		if (is_dir($LISTAR)) { 
							$PASTAS[]=$LISTAR; 
						} else{ 
							$ARQUIVOS[]=$LISTAR;
						}
				   }
				}
				if ($ARQUIVOS != "") {
				$MJO->NTR('align="LEFT" COLSPAN="3" vAlign="top" class='.$COR1.'');
				$o = new printConteudo(" <b id='destaque10'>$_REPOSITORIOS_ATUAIS</b>");
				foreach($ARQUIVOS as $LISTAR){
				if($LISTAR == $repositorioArquivos){
					$destaque = "destaque8";
				}else{
					$destaque = "destaque3";
				}
				print "<b id=\"$destaque\">[ ".$LISTAR."&nbsp;]</b>";
				}
				$MJO->NCTR();
				}
				}
				
/**/
				if($VersaoDemo == "1"){
				$F->inputDica('','','','TYPE="hidden" name="repositorioArquivosTrocado" value="'.$repositorioArquivos.'"');
				}
				$F->inputTD('colspan="3"',$classeLinha1,'<b id="destaque5">'.$_REPOSITORIO.'</b>','<b id="destaque5">'.$_NUM_REGISTROS.'</b>',$classeLinha1,'TYPE="TEXT" CLASS='.$classeInput.' '.$desabilitar.' TITLE="'.$_TITULO_DESABILITADO.'" name="repositorioArquivosTrocado" value="'.$repositorioArquivos.'" size="20"','TYPE="TEXT" TITLE="'.$_TITULO_DESABILITADO.'" name="numeroRegistrosPaginaRelatorioTrocado" value="'.$numeroRegistrosPaginaRelatorio.'" size="2"',$_DICA_CAMPO_REPOSITORIO,$_DICA_CAMPO_NUM_REGISTROS,$CFG->iconeAjuda,$_REPOSITORIO,$_NUM_REGISTROS);				
				//$F->inputDica($classeLinha1,'<b id="destaque5">'.$_REPOSITORIO.'</b>',$classeLinha1,'TYPE="TEXT" title="'.$_TITULO_DESABILITADO.'" CLASS='.$classeInput.' '.$desabilitar.' name="repositorioArquivosTrocado" value="'.$repositorioArquivos.'" size="20"',$_DICA_CAMPO_REPOSITORIO,$CFG->iconeAjuda,$_REPOSITORIO);
				$MJO->NTR('align="LEFT" COLSPAN="3" vAlign="top" class='.$COR1.'');
				$o = new printConteudo(" <b id='destaque3'>ex: repositorio_xml</b>");
				$MJO->NCTR();
								
				$MJO->NHR('colspan="3" class='.$COR1.'');

/* -- [ AUTO-CADASTRO ] -- */
				
				$MJO->NTR('align="LEFT" vAlign="top" class='.$COR7.'');
				$o = new printConteudo(" <b id='destaque5'>$_AUTO_CADASTRO</b>");
				$MJO->NTD('align="left" class='.$COR7.'');
					$FORM->comboSIM_NAO("autoCadastroTrocado",$autoCadastro);
				$MJO->NTD('align="left" class='.$COR7.'');
				$F->ajuda2 ("","",$_DICA_CAMPO_AUTO_CADASTRO,$CFG->iconeAjuda,$_AUTO_CADASTRO,$_AUTO_CADASTRO);				
				
/* -- [ STATUS DE AUTO-CADASTRO ] -- */
				
				$MJO->NTR('align="LEFT" COLSPAN="3" vAlign="top" class='.$COR7.'');
						$o = new printConteudo("<b id='destaque4'>$_STATUS_ATUAL</b>");
					if($autoCadastro == "UM"){
						$o = new printConteudo("<b id='destaque3'>$_PERMITIDO</b>");
					}else{						
						$o = new printConteudo("<b id='destaque10'>$_NAO_PERMITIDO</b>");
					}
				$MJO->NCTR();

/* -- [ LINK RETORNO / NOME EVENTO ] -- */

				$F->inputTD('colspan="3"',$classeLinha1,'<b id="destaque5">'.$_LINK_RETORNO.'</b>','<b id="destaque5">'.$_NOME_EVENTO.'</b>',$classeLinha1,'TYPE="TEXT" CLASS='.$classeInput.' " name="linkRedirecionaRetornoTrocado" value="'.$linkRedirecionaRetorno.'" size="20"','TYPE="TEXT" name="nomeEventoTrocado" value="'.$nomeEvento.'" size="20"',$_DICA_CAMPO_LINK_RETORNO,$_DICA_CAMPO_NOME_EVENTO,$CFG->iconeAjuda,$_LINK_RETORNO,$_NOME_EVENTO);
		
/* -- [ PRÉ-REQUISITOS ] -- */

				$F->inputDica($classeLinha2,'<b id="destaque5">'.$_PRE_REQUISITOS.'</b>',$classeLinha2,'TYPE="TEXT" name="preRequisitosTrocado" value="'.$preRequisitos.'" size="60"',$_DICA_CAMPO_PRE_REQUISITOS,$CFG->iconeAjuda,$_PRE_REQUISITOS);

				$MJO->NHR('colspan="3" class='.$COR1.'');

/* -- [ TITULO DO SITE ] -- */

				$F->inputDica($classeLinha2,'<b id="destaque5">'.$_TITULO_SITE.'</b>',$classeLinha2,'TYPE="TEXT" name="tagTituloSiteTrocado" value="'.$tagTituloSite.'" size="60"',$_DICA_TITULO_SITE,$CFG->iconeAjuda,$_TITULO_SITE);
				$MJO->NTR('align="left" vAlign="top" class='.$COR1.'');

/* -- [ DESCRIÇÃO ] -- */
				
					$o = new printConteudo("<b id='destaque5'>$_DESCRICAO</b>");
				$MJO->NTD('align="left" class="c1"');									
				$FORM->textArea('cols="57" rows="3" name="metaDescricaoTrocado"',$metaDescricao);
				$MJO->NTD('align="left" class="c1"');				
					$MJO->ajuda2("","","$_DICA_CAMPO_DESCRICAO","$CFG->iconeAjuda","","$_DESCRICAO");				
				$MJO->NCTR();				

/* -- [ PALAVRAS CHAVE ] -- */
				
				$F->inputDica($classeLinha2,'<b id="destaque5">'.$_PALAVRA_CHAVE.'</b>',$classeLinha2,'TYPE="TEXT" name="metaPalavrasChaveTrocado" value="'.$metaPalavrasChave.'" size="60"',$_DICA_CAMPO_PALAVRA_CHAVE,$CFG->iconeAjuda,$_PALAVRA_CHAVE);

/* -- [ METATAG AUTOR ] -- */
				
				$F->inputDica($classeLinha1,'<b id="destaque5">'.$_USUARIO_AUTOR.'</b>',$classeLinha1,'TYPE="TEXT" name="metaAutorTrocado" value="'.$metaAutor.'" size="60"',$_DICA_CAMPO_AUTOR,$CFG->iconeAjuda,$_USUARIO_AUTOR);
				
				$MJO->NHR('colspan="3" class='.$COR1.'');

/* -- [ CAMINHO VIRTUAL ] -- */

				$F->inputDica($classeLinha2,'<b id="destaque5">'.$_CAMINHO_VIRTUAL.'</b>',$classeLinha2,'TYPE="TEXT" class="inputDesabilitado" disabled name="caminhoVirtualTrocado" value="'.$ROTA.'" size="60"',$_DICA_CAMPO_CAMINHO_VIRTUAL,$CFG->iconeAjuda,$_CAMINHO_VIRTUAL);

/* -- [ CAMINHO FISICO ] -- */
				
				$F->inputDica($classeLinha1,'<b id="destaque5">'.$_CAMINHO_FISICO.'</b>',$classeLinha1,'TYPE="TEXT" class="inputDesabilitado" disabled name="caimnhoFisicoTrocado" value="'.$INCLUDE.'" size="60"',$_DICA_CAMPO_CAMINHO_FISICO,$CFG->iconeAjuda,$_CAMINHO_FISICO);

/* -- [ BOTÏ ] -- */
				
				$MJO->NTR('align="center" colspan="2" class='.$COR1.'');
					$FORM->mostraBotao("BUTTON","enviar","enviar","$_ALTERAR");			

/* -- [ EXECUSSÏ DE TAREFA ] -- */
				
if(isset($_POST["alterar"])){
	$arquivo = fopen('../config.inc.php','r+');
	if ($arquivo) {

	    function replace_lines($file, $new_lines, $source_file = NULL) {
	        $response = 0;
	        //characters
	        $tab = chr(9);
	        $lbreak = chr(13) . chr(10);
	        //get lines into an array
	        if ($source_file) {
	            $lines = file($source_file);
	        }
	        else {
	            $lines = file($file);
	        }
	        //change the lines (array starts from 0 - so minus 1 to get correct line)
	        foreach ($new_lines as $key => $value) {
	            $lines[--$key] = $tab . $value . $lbreak;
	        }
	        //implode the array into one string and write into that file
	        $new_content = implode('', $lines);
	 
	        if ($h = fopen($file, 'w')) {
	            if (fwrite($h, $new_content)) {
	                $response = 1;
	            }
	            fclose($h);
	        }
	        return $response;
	    }

			if($senhaGravadaTrocada != ""){
				$SenhaGravada = md5($senhaGravadaTrocada);				
			}else{
				$SenhaGravada = $SenhaGravada;				
			}
			if($usuarioGravadoTrocado != ""){
				$usuarioGravado = md5($usuarioGravadoTrocado);				
			}else{
				$usuarioGravado = $usuarioGravado;				
			}
			
		$new_lines = array(
		37 =>'$idioma = "'.$idiomaTrocado.'";',
		38 =>'$EMPRESA_NOME = "'.$nomeEmpresaTrocado.'";',
		39 =>'$AUTOR1_Email = "'.$emailTrocado.'";',
		40 =>'$tema = "'.$temaTrocado.'";',
		41 =>'$NomeModulo = "'.$NomeModuloTrocado.'";',
		42 =>'$repositorioArquivos = "'.$repositorioArquivosTrocado.'";',
		43 =>'$numeroRegistrosPaginaRelatorio = "'.$numeroRegistrosPaginaRelatorioTrocado.'";',
		44 =>'$autoCadastro = "'.$autoCadastroTrocado.'";',
		45 =>'$SenhaGravada = "'.$SenhaGravada.'";',
		46 =>'$usuarioGravado = "'.$usuarioGravado.'";',
		47 =>'$metaDescricao = "'.$metaDescricaoTrocado.'";',
		48 =>'$metaPalavrasChave = "'.$metaPalavrasChaveTrocado.'";',
		49 =>'$metaAutor = "'.$metaAutorTrocado.'";',
		50 =>'$tagTituloSite = "'.$tagTituloSiteTrocado.'";',
		51 =>'$producao = "'.$producao.'";',
		52 =>'$linkRedirecionaRetorno = "'.$linkRedirecionaRetornoTrocado.'";',
		53 =>'$nomeEvento = "'.$nomeEventoTrocado.'";',
		54 =>'$preRequisitos = "'.$preRequisitosTrocado.'";'
		);
	replace_lines("../config.inc.php", $new_lines);
			
/* -- [ ATUALIZA PARA MOSTRAR ALTERAÇÕES ] -- */
	
	print " <META HTTP-EQUIV=\"Refresh\" Content=0;URL=\"mostra_configuracoes.php\"> ";
}
}		
				$MJO -> NCTB();
}else{

/* -- [ BLOQUEIA ACESSO ] -- */

	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";	
}
print "<br/>";
$MJO->fim($INCLUDE,$tema);
?>