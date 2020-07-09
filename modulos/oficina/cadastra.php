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

$telefone = "[ $tel_ddd ] $tel_prefixo - $tel_sufixo";											
print "<center>";

	if((isset($_POST['autoCadastro']))and(!isset($_SESSION["usuario"]))){
					$MJO->NOTB('class='.$COR1.' width="753"');	
						$MJO->NTR('class='.$COR1.' align="CENTER"');
						print "<input id=\"enviar\" type=\"button\" value=\"$_IMPRESSAO\" onclick=\"javascript:window.print()\">";
						$MJO->NTD('class='.$COR1.' align="CENTER"');
						print " <script language=\"javascript\" type=\"text/javascript\">  
 									function setLocationHref()
        							{
            						// set the location path as local page name.
            						window.location.href = '$linkRedirecionaRetorno';
        							}										  
    							</script> ";						
						print "<input id=\"enviar\" type=\"button\" value=\"$_VOLTAR\" onclick=\"setLocationHref();\">";
						$MJO->NCTB();
					$MJO->NOTB('class='.$COR1.' width="753"');	
		
	}else{		

					$MJO->NOTB('class='.$COR1.' width="753"');				
						$MJO->NTR('class='.$COR1.' align="CENTER"');
							$o = new printConteudo("<a class=\"link2\" href=\"index.php?verifica=true\"><img src='$ROTA/temas/$tema/imagens/icones/cadastro.png'><b>$_CADASTRAR_OUTRO</b></a>");
						$MJO->NCTR();	
						$MJO->NHR('colspan="3" class='.$COR1.'');
	}
/**/
// -------------------------------------------------------------  CRIANDO O ARQUIVO XML
			
include("$INCLUDE/modulos/$NomeModulo/dados_xml.inc.php");

$diretorioModulo = "$INCLUDE/".$CFG->caminhoArquivosXML;
$diretorio = "$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos";

		if(!is_dir("$diretorioModulo")) {  
			mkdir("$diretorioModulo/", 0755);
			$arquivo0 = fopen($diretorioModulo.'/index.html','w');
			if ($arquivo0 == false) die($_NAO_PODE_CRIAR_ARQUIVO);			
		}

		if(!is_dir("$diretorio")) {  
			mkdir("$diretorio/", 0755);
			$arquivo1 = fopen($diretorio.'/index.html','w');
			if ($arquivo1 == false) die($_NAO_PODE_CRIAR_ARQUIVO);			
		}
		
$arquivo=("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$matricula.xml");
$arq=fopen($arquivo,"w");
fputs($arq,$conteudo);
fclose ($arq);
					$MJO->NTR('class='.$COR7.' align="LEFT"');
					$MJO->NOTB('class='.$COR1.' width="100%"');			
						$MJO->NTR('class='.$COR10.' align="center"');						
							$o = new printConteudo('<b>'.$_DADOS_CADASTRADOS_SUCESSO. '</b>');
					$MJO->NCTB();	
/**/	
						$MJO->NTR('class='.$COR1.' align="LEFT"');
						include("$INCLUDE/modulos/$NomeModulo/classe_switch.php");
						$TROCA = new meuSwitch;
					$MJO->NOTB('class='.$COR1.' width="100%"');			
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_MATRICULA</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$matricula</span>");
						$MJO->NCTR();				

						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_NOME</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($nome);
						$MJO->NCTR();

						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_EMAIL</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($email);
						$MJO->NCTR();
											
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_SEXO</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							 $sexoCadastrado = $sexo;
							 $TROCA->mostraSexo($sexoCadastrado);
						$MJO->NCTR();
						
						$MJO->NHR('colspan="3" class='.$COR1.'');

						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_OFICINA</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							 $oficinaCadastrado = $oficina;
							 $TROCA->mostraOficina($oficinaCadastrado);
						$MJO->NCTR();
						
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_ESCOLARIDADE</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							 $escolaridadeCadastrada = $escolaridade;
							 $TROCA->mostraEscolaridade($escolaridadeCadastrada);
						$MJO->NCTR();
						
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_HORARIO_PERIODO</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$horarioCadastrado = $horario;
							 $TROCA->mostraHorario($horarioCadastrado);
						$MJO->NCTR();
						
						$MJO->NHR('colspan="3" class='.$COR1.'');
						
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_RESPONSAVEL</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($responsavel);
						$MJO->NCTR();
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_NOME_MAE</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($nome_mae);
						$MJO->NCTR();
						
						$MJO->NHR('colspan="3" class='.$COR1.'');
												
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_ENDERECO</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($endereco);
						$MJO->NCTR();	
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_TELEFONE</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($telefone);
						$MJO->NCTR();	
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_BAIRRO</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($bairro);
						$MJO->NCTR();	
						$MJO->NTR('class='.$COR1.' align="LEFT"');
							$o = new printConteudo("<span id='destaque3'>$_CIDADE</span>");
						$MJO->NTD('class='.$COR1.' align="LEFT"');
							$o = new printConteudo($cidade);
						$MJO->NCTR();			
					$MJO->NCTB();
				$MJO->NCTB();
		$MJO->NCTB();
print "<br/>";							
$MJO->fim($INCLUDE,$tema);
?>