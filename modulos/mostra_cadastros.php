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
session_name("soordle_xamaleon");
session_start();
unset($pagina);
unset($diretorio);
$pagina = "mostra_cadastros";
$diretorio = "1";

				include('../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
				
if($_SESSION["usuario"] != ""){
	if((isset($_POST["recebeValores"])) ||(isset($_GET["buscaNome"]))){
		/*import_request_variables("pg");*/
		extract($_GET);
		extract($_POST);
		print "<center>";
		montaMenu();
			$MJO->NOTB('class='.$COR1.' width="753"');
				$MJO->NTR("$_TOTAL: $totalArquivos","2","","#000000","","RIGHT","top","$COR3","","$COR3","$COR3");
				$MJO->NCTR();
			
		if($diretorio_selecionado == ''){
			$diretorio_selecionado = "$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos";
		}
		
		$FORM->abreForm("$NomeModulo/recebelista_nomesarquivos.php","post","form","","");
		$FORM->mostraInput2("hidden","35","diretorio_selecionado","$diretorio_selecionado","50","input2","","","");
		$FORM->mostraInput2("hidden","35","busca","$busca","50","input2","","","");


/* -- [ RECEBEMOS OS VALORES DO FORMULARIO E COMEǁMOS A TRATAR ] -- */

		function trata_form() {
			global $valor;
			$valores = join ("#",$valor);
			session_name("soordle_xamaleon");
			@session_start();
	 		$_SESSION["nomesArquivos"] = "$valores";
		}
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeRelatorio","","","","")." $_EXIBIR_RELATORIO</b>");
				$MJO->NCTR();	
						
/* -- [ BUSCAR ARQUIVOS PELO NOME ] --*/
									
		$MJO->NTR('colspan="2" align="right" vAlign="top" class='.$COR6.'');
			$o = new printConteudo('<b id="destaque5"><a class="link2" href="busca_nomes.php?verifica=true">'.$_BUSCA_NOMES.'</a></b>');
		$MJO->NCTR();	

/* -- [ // BUSCAR POR NOMES ] -- */	

		$FORM->mostraInput2("hidden","5","recebeValoresLeDiretorio","true","50","input2","","","");
		$FORM->mostraInput2("hidden","5","totalArquivos","$totalArquivos","50","input2","","","");
		
				$MJO->NTR('colspan="2" align="left" vAlign="top" class='.$COR1.'');
				$o = new printConteudo("<b id='destaque5'>$_PASSO_DOIS</b><br/>$_DADOS_PARA_CONSULTA<br/>$_CLIQUE_PROSSEGUIR");
				$MJO->NCTR();
				$MJO->NTR('colspan="2" align="center" vAlign="top" class='.$COR1.'');
			trata_form();

$MJO->NHR('colspan="2" class='.$COR1.'');
				
				$MJO->NTR('colspan="2" align="center" vAlign="top" class='.$COR1.'');
					
					$FORM->mostraBotao("BUTTON","enviar","enviar","$_PROSSEGUIR");
		  			print "<br/><br/>";
				$MJO->NCTR();		  
				$MJO->NTR('colspan="2" align="center" vAlign="top" class='.$COR3.'');
				$o = new printConteudo("<a class=\"link1\" href=javascript:history.back();><b>$_VOLTAR</b></a>");
				$MJO->NCTB();		  
		$FORM->fecha_form();	
$MJO->fim($INCLUDE,$tema);			  
		exit;
	}
	
// ----------------------------------[ FUNCAO PARA MONTAGEM DOS INPUTS COM OS DEVIDOS VALORES EM ARRAYS

		function print_input ($name, $value, $label = '',$type) {
		
		    static $idcounter = 0;
		
		    if (!$name) {
		        $name = 'unnamed';
		    }
		
		    $htmlid = 'auto-cb'.sprintf('%04d', ++$idcounter);
		    $output  = '<span class="c12 '.$name."\">";
		    $output .= '<input class="input2" size="30" name="'.$name.'[]" id="'.$htmlid.'" type="'.$type.'" value="'.$value.'" />';
		    if(!empty($label)) {
		        $output .= ' <label for="'.$htmlid.'">'.$label.'</label>';
		    }
		    $output .= '</span>'."\n";
		
		    echo $output;
		
		}
		
/* -- [ CASO O ADMINISTRADOR  TENHA SETADO UM NOVO REPOSITӒIO E ESTE AINDA NÏ FOI CRIADO ] -- */		
/* -- [ OS NOVOS DIRETӒIOS SÏ CRIADOS A PARTIR DO PRIMEIRO CADASTRO ] -- */		

		if(!file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos")){
			print "<center>";
			montaMenu();

				$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR1.'');
			$MJO->NOTB('class='.$COR1.' cellpadding="4" BORDER="0" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeRelatorio","","","","")." $_IMPRESSAO</b>");
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
			$diretorio = "$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos";

	}


			$ponteiro  = opendir($diretorio);
			while ($nome_itens = readdir($ponteiro)) {
			    $itens[] = $nome_itens;
			}
			sort($itens);
			foreach ($itens as $listar) {
  				 if ($listar!="." && $listar!=".."){ 
               		 if (is_dir($listar)) { 
		                 $pastas[]=$listar; 
		              }else{
		                 $arquivos[]=$listar;
		              }
  		 		}
			}
			
// ----------------------------------[ Vimos acima, a express㯠is_dir, indicando que as a絥s devem esnt㯠ser executadas, 
// ----------------------------------[ ali mesmo, no diret�rio que jᠦoi aberto e lido. As a絥s que executamos ali, foram: 
// ----------------------------------[ ver se tem pastas, listar. Ver se tem arquivos, listar.
// ----------------------------------[ Agora, se houverem pastas, ser㯠apresentadas antes dos arquivos, em odem alfab鴩ca.
// ----------------------------------[ Se n㯠houverem, ser㯠apresentados apenas os arquivos, na mesma ordem.
// ----------------------------------[ E se houverem os dois, ser㯠mostrados igualmente.
// ----------------------------------[  lista as pastas se houverem

			$FORM->abreForm("$pagina.php","post","form","","");
			$FORM->mostraInput2("hidden","5","recebeValores","true","50","input2","","","");

// ----------------------------------[ lista os arquivos se houverem
		print "<center>";
		montaMenu();
			
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeRelatorio","","","","")." $_EXIBIR_RELATORIO</b>");
				$MJO->NCTR();			

/* -- [ BUSCAR ARQUIVOS PELO NOME ] --*/									

		$MJO->NTR('colspan="2" align="right" vAlign="top" class='.$COR6.'');
			$o = new printConteudo('<b id="destaque5"><a class="link2" href="busca_nomes.php?verifica=true">'.$_BUSCA_NOMES.'</a></b>');
		$MJO->NCTR();	

/* -- [ // BUSCAR POR NOMES ] -- */			

				$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR1.'');
				
					$MJO->NOTB('width="100%"');
						if (!isset($arquivos)) {
							$MJO->NOTB('class='.$COR1.' width="749"');
							$MJO->NTR('colspan="2" align="center" vAlign="top" class='.$COR1.'');
								$o = new printConteudo('<b id="destaque1">'.$_NENHUM_ARQUIVO_ENCONTRADO.'</b>');
							$MJO->NCTB();
							$MJO->NCTB();
							print "<br/>";
						$MJO->fim($INCLUDE,$tema);
							exit;
							}else{
								
						if ($arquivos != "") {
							$colunas="3"; // defina o n�mero de colunas desejado.
							$total="1";
						
							foreach($arquivos as $listar){
							// ----------------------------------[ 
						
								$nomeCampo = explode("_",$listar);									
								if(!isset($diretorio_selecionado)){
									$diretorio_selecionado = "";
								}
								if($diretorio_selecionado == ''){
									$diretorio_selecionado = "xml";
								}									
									if(!isset($busca)){
										$busca = "";
									}					
									$FORM->mostraInput2("hidden","30","diretorio_selecionado","$diretorio_selecionado","255","input2","","","");
									$FORM->mostraInput2("hidden","30","busca","$busca","255","input2","","","");
						
								if(!isset($nomeCampo[1])){
									$nomeCampo[1] = "";
								}
								if($nomeCampo[1] == 'xml'){
									if($total==1){
									}	
								}       

										if ($listar != "index.html") {
												print_input ('valor',$listar,'','hidden','');	
												}
						
								if($total==$colunas){
								$total=0;
								}
								$total=$total+1;
							}
						}
						
}
   				$MJO->NCTB();

// ----------------------------------[ PEGAMOS AGORA O TOTAL DE ARQUIVOS ENCONTRADOS NO DIRETORIO

				$MJO->NCTR();
				$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR1.'');
						$MJO->NOTB('cellpadding="8" width="100%"');
						
						$pasta  = "$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos";
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
									$FORM->mostraInput2("hidden","30","totalArquivos","$files","255","input2","","","");

															
						closedir($handle);
						
						
										$MJO->NTR('colspan="2" align="LEFT" vAlign="top" class='.$COR1.'');
											$o = new printConteudo("<b ID='destaque5'>$_PASSO_UM</b><br/>$_FORAM_ENCONTRADOS_TOTAL <b id='destaque9'>$files</b> $_ARQUIVOS <b id='destaque11'>[ $repositorioArquivos ]</b><br/>$_PRECISAMOS_ARMAZENAR<br>$_CLIQUE_PROSSEGUIR");
										$MJO->NCTR();						
										$MJO->NHR('colspan="2" class='.$COR1.'');
										$MJO->NTR('colspan="2" align="center" vAlign="top" class='.$COR1.'');
										if($files == "0"){
											print $_NENHUM_ARQUIVO_ENCONTRADO;											
										}else{
											
											$FORM->mostraBotao("BUTTON","enviar","enviar","$_PROSSEGUIR");
										}
										$MJO->NHR('colspan="2" class='.$COR1.'');						
						print "<br/></form>";
							$MJO->NCTB();
			$MJO->NCTB();
	
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";
}
print "<br/>";
$MJO->fim($INCLUDE,$tema);
?>