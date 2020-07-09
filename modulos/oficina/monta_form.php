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
if (file_exists("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php")){
	include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");
}
if($pagina == "index.php"){
	$MJO->NTR('colspan="3" align="RIGHT" vAlign="top" class='.$COR4.'');

		$o = new printConteudo("<b id='destaque2'>".$MJO->imagensTag("$CFG->iconeInicial","","","","")." $_MATRICULA</b>");
	$MJO->NCTR();												
			$MJO->NCTR();																																
			$MJO->NHR('colspan="3" class='.$COR1.'');	
			$FORM->abreForm("","POST","customForm","customForm","");
			if($autoCadastro == "UM"){
				$FORM->mostraInput2("hidden","","cadastra","true");
				$FORM->mostraInput2("hidden","","autoCadastro","$autoCadastro");
				if(isset($_SESSION["usuario"])){
				$FORM->mostraInput2("hidden","","verifica","true");
				}
			}else{
							
				$FORM->mostraInput2("hidden","","cadastra","true");
				$FORM->mostraInput2("hidden","","verifica","true");
			}
					
			$FORM->mostraInput2("hidden","60","matricula","$identificacao");
				
}else{
			$FORM->abreForm("$pagina","post","customForm","customForm","");
			$FORM->mostraInput2("hidden","","nomeArquivo","$qualArquivo");
			$FORM->mostraInput2("hidden","","matricula2","$matricula");
			$FORM->mostraInput2("hidden","","atualizar","true");
			if (file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo")) {
			$xml = simplexml_load_file("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo");
			}
						$MJO->NTR('class='.$COR1.' colspan="2" align="center"');
							$o = new printConteudo("<b id=\"destaque5\">$_EDITAR</b>");
						$MJO->NCTR();								
						$MJO->NTR('colspan="2" align="left" class='.$COR3.'');
							$o = new printConteudo("<b>$_IDENTIFICACAO</b>: $qualArquivo");
						$MJO->NCTR();								
						$MJO->NHR('colspan="3" class='.$COR1.'');
																					
}						
						if(!isset($xml)){
							$xml = new stdClass();
							$xml->NOME = "";
							$xml->EMAIL = "";
							$xml->RESPONSAVEL = "";
							$xml->NOME_DA_MAE = "";
							$xml->TELEFONE = "";
							$xml->ENDERECO = "";
							$xml->BAIRRO = "";
							$xml->CIDADE = "";
							$xml->SEXO = "";
							$xml->HORARIO = "";
							$xml->ESCOLARIDADE = "";
							$xml->OFICINA = "";
							$xml->OFICINA = new stdClass();
							$xml->OFICINA->TIPO = "";
							
							$valorBotaoEnvia = $_CADASTRAR;
						}else{
							$valorBotaoEnvia = $_EDITAR;
						}

if($pagina != "index.php"){
// ------- APROVADO
				$MJO->NTR('align="left" class='.$COR1.'');
					$o = new printConteudo('<b id="destaque5">'.$_APROVADO.'</b>');									
				$MJO->NTD('align="left" class='.$COR1.'');
					if($xml->APROVADO == ""){
						$xml->APROVADO = $_SELECIONE_OPCAO;
					}											
					$APROVADOARR = array("$_NAO","$_SIM");   
					$FORM-> comboBox('aprovado','comboBox', $APROVADOARR,$xml->APROVADO, 'title="'.$_SELECIONE_OPCAO.'"');		
				$MJO->NCTR();	
}else{				
											
					$F->input($COR6,'',$COR6,'TYPE="hidden" name="aprovado" value="0" size="1"');
}


if(isset($_POST["cadastra"])){
		require_once("$INCLUDE/includes/validar.php");			
		if( isset($_POST['enviar']) && (!validateName($_POST['nome']) || !validateEmail($_POST['email']) ) ){				
						if(!validateName($_POST['nome'])){							
							$MJO->NTR('colspan="3" align="left" vAlign="top" id="error"');
								$o = new printConteudo('<b id="destaque3">'.$_NOME.' &nbsp;'.$_INVALIDO.':</b> '.$_NOME_DEVE_CONTER.'');
							$MJO->NCTR();						
						}
						if(!validateEmail($_POST['email'])){							
							$MJO->NTR('colspan="3" align="left" vAlign="top" id="error"');
							$o = new printConteudo('<b id="destaque3">'.$_EMAIL.' &nbsp;'.$_INVALIDO.':</b> '.$_EMAIL_VALIDO.'');
							$MJO->NCTR();						
						}
			}elseif(isset($_POST['enviar'])){				
				include("$INCLUDE/modulos/$NomeModulo/campos_obrigatorios.php");	
				include("$INCLUDE/modulos/$NomeModulo/cadastra.php");
				exit;
			}
	}
	
/* ------------------------------------------------------------------ */				
	print"<script type=\"text/javascript\" src=\"$ROTA/includes/js/jquery.js\"></script>";
	print"<script type=\"text/javascript\" src=\"$ROTA/includes/js/validation.js\"></script>";
/* ------------------------------------------------------------------ */
/* -- [ NOME ] -- */						
								
					$F->inputAjax($COR6,'<b id="destaque7">*</b><b id="destaque5">'.$_NOME.'</b>',$COR6,'TYPE="TEXT" id="name" name="nome" value="'.$xml->NOME.'" size="40" title="'.$_TITLE_CAMPO_NOME.'"','nameInfo');					

/* -- [ EMAIL ] -- */	
										
					$F->inputAjax($COR6,'<b id="destaque7">*</b><b id="destaque5">'.$_EMAIL.'</b>',$COR6,'TYPE="TEXT" id="email" name="email" value="'.$xml->EMAIL.'" size="40" title="'.$_TITLE_CAMPO_EMAIL.'"','emailInfo');																

// ------- ESCOLARIDADE
									$MJO->NTR('align="left" class='.$COR1.'');
										$o = new printConteudo('<b id="destaque5">'.$_ESCOLARIDADE.'</b>');									
										$MJO->NTD('align="left" class='.$COR1.'');
											$ESCOLARIDADEAARR = array($_ANALFABETO,$_PRIMARIO_INCOMPLETO,$_PRIMARIO_COMPLETO,$_GINASIO_INCOMPLETO,$_GINASIO_COMPLETO,$_SEG_GRAU_INCOMPLETO_AC,$_SEG_GRAU_COMPLETO_AC,$_SEG_GRAU_INCOMPLETO_TC,$_SEG_GRAU_COMPLETO_TC,$_TERC_GRAU_INCOMPLETO,$_TERC_GRAU_COMPLETO,$_POS_CURSANDO,$_POS_CONCLUIDO,$_MESTRADO_CURSANDO,$_MESTRADO_CONCLUIDO,$_DOUTORADO_CURSANDO,$_DOUTORADO_CONCLUIDO,$_MBA_CURSANDO,$_MBA_CONCLUIDO);
											$FORM-> comboBox('escolaridade','comboBox', $ESCOLARIDADEAARR,$xml->ESCOLARIDADE, 'title="'.$_SELECIONE_OPCAO.'"');
									$MJO->NCTR();
									
// ------- SEXO

									$MJO->NTR('align="left" class='.$COR1.'');
										$o = new printConteudo('<b id="destaque5">'.$_SEXO.'</b>');									
										$MJO->NTD('align="left" class='.$COR1.'');										
											$SEXOARR = array("$_MASCULINO", "$_FEMININO",);   
											$FORM-> comboBox('sexo','comboBox', $SEXOARR,$xml->SEXO, 'title="'.$_SELECIONE_OPCAO.'"');											
									$MJO->NCTR();
									$MJO->NHR('colspan="3" class='.$COR1.'');
									
						// ------- OFICINA
						
									$MJO->NTR('align="left" class='.$COR1.'');
										$o = new printConteudo('<b id="destaque5">'.$_OFICINA.'</b>');									
										$MJO->NTD('align="left" class='.$COR1.'');												
											$OFICINAARR = array($_ESPORTES,$_ARTES,$_CIENCIAS,$_LITERATURA,$_ESTUDOS_SOCIAIS);   
											$FORM-> comboBox('oficina','comboBox', $OFICINAARR,$xml->OFICINA->TIPO, 'title="'.$_SELECIONE_OPCAO.'"');												
									$MJO->NCTR();
									
						// ------- HORARIO
						
									$MJO->NTR('align="left" class='.$COR1.'');
										$o = new printConteudo('<b id="destaque5">'.$_HORARIO_PERIODO.'</b>');									
										$MJO->NTD('align="left" class='.$COR1.'');											
											$horario = array("$_MANHA", "$_TARDE", "$_NOITE",);   
											$FORM-> comboBox('horario','comboBox', $horario,$xml->HORARIO, 'title="'.$_SELECIONE_OPCAO.'"');		
									$MJO->NCTR();
						$MJO->NHR('colspan="3" class='.$COR1.'');
						
						// ------- RESPONSAVEL
						
						$F->input($COR6,'<b id="destaque5">'.$_RESPONSAVEL.'</b>',$COR6,'TYPE="TEXT" name="responsavel" value="'.$xml->RESPONSAVEL.'" size="40" title="'.$_TITLE_CAMPO_RESPONSAVEL.'"');						
									
						// ------- NOME DA MAE

						$F->input($COR6,'<b id="destaque5">'.$_NOME_MAE.'</b>',$COR6,'TYPE="TEXT" name="nome_mae" value="'.$xml->NOME_DA_MAE.'" size="40" title="'.$_TITLE_CAMPO_NOME_MAE.'"');						

									$MJO->NHR('colspan="3" class='.$COR1.'');
									
						// ------- TELEFONE	
													
									$MJO->NTR('align="left" class='.$COR1.'');
										$o = new printConteudo('<b id="destaque5">'.$_TELEFONE.'</b>');									
										$MJO->NTD('align="left" class='.$COR1.'');	
										if($xml->TELEFONE == ""){
											$FORM->mostraInput2("text","3","tel_ddd","","3","","","","title=\"$_TITLE_CAMPO_TELEFONE\"");
											print " - ";
											$FORM->mostraInput2("text","6","tel_prefixo","","4","","","","title=\"$_TITLE_CAMPO_TELEFONE\"");
											print " - ";
											$FORM->mostraInput2("text","6","tel_sufixo","","4","","","","title=\"$_TITLE_CAMPO_TELEFONE\"");
										}else{											
											$FORM->mostraInput2("text","40","telefone","$xml->TELEFONE","255","","","","title=\"$_TITLE_CAMPO_TELEFONE\"");
										}	
											
									$MJO->NCTR();
									
						// ------- ENDERECO
						
						$F->input($COR6,'<b id="destaque5">'.$_ENDERECO.'</b>',$COR6,'TYPE="TEXT" name="endereco" value="'.$xml->ENDERECO.'" size="40" title="'.$_TITLE_CAMPO_ENDERECO.'"');						

						// ------- BAIRRO
						
						$F->input($COR6,'<b id="destaque5">'.$_BAIRRO.'</b>',$COR6,'TYPE="TEXT" name="bairro" value="'.$xml->BAIRRO.'" size="40" title="'.$_TITLE_CAMPO_BAIRRO.'"');						

						// ------- CIDADE
						
						$F->input($COR6,'<b id="destaque5">'.$_CIDADE.'</b>',$COR6,'TYPE="TEXT" name="cidade" value="'.$xml->CIDADE.'" size="40" title="'.$_TITLE_CAMPO_CIDADE.'"');						
																																					
									$MJO->NTR('colspan="2" align="center" class='.$COR1.'');
										$FORM->mostraBotao("BUTTON","enviar","enviar","$valorBotaoEnvia");
print "</DIV>";	
							
?>