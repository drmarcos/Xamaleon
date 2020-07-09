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
$pagina = "gera_pdf";
$diretorio = "2";
/*import_request_variables("g");*/
extract($_GET);
extract($_POST);
				include('../../classes/var.php');
				$MJO->topo($INCLUDE,$tema);
				include("$INCLUDE/modulos/$NomeModulo/idiomas/$idioma/main.lang.php");				
				include("$INCLUDE/modulos/$NomeModulo/classe_switch.php");
				$TROCA = new meuSwitch;
				
if($_SESSION["usuario"] != ""){

$diretorioArmazenamentoPdf = "pdf/".$repositorioArquivos;

		if(!is_dir("$diretorioArmazenamentoPdf")) {  
			mkdir("$diretorioArmazenamentoPdf/", 0755);
			$arquivo = fopen($diretorioArmazenamentoPdf.'/index.html','w');
			if ($arquivo == false) die($_NAO_PODE_CRIAR_ARQUIVO);			
		}		
		
/* -- [ DETERMINAMOS O TIPO DE IMPRESSÏ ] -- */		

	if(!isset($_SESSION["nomesArquivos"])){ /* -- [ ARQUIVOS INDIVIDUAIS ] -- */
		$valorNomesArquivos = $nomeArquivo;
		$arq = explode('.', $valorNomesArquivos);
		$nomeParaPdf = $arq[0];
		$tipoRelatorio = $_INDIVIDUAL;
	}else{									/* -- [ TODOS REGISTROS ] -- */
		$valorNomesArquivos = $_SESSION["nomesArquivos"];
		$nomeParaPdf = "todos".date('Y_m_d');
		$tipoRelatorio = $_COMPLETO;
	}
						
require_once("$INCLUDE/includes/fpdf16/fpdf.php");
$pdf= new FPDF('P');
$pdf-> Open();

	$totalArquivos = $totalArquivos-1;
	$i=0;
	while($i<=$totalArquivos)
  	{
		$array_nomes = explode("#",$valorNomesArquivos);	
		$qualArquivo = $array_nomes[$i];
				if (file_exists("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo")) {
				$xml = simplexml_load_file("$INCLUDE/".$CFG->caminhoArquivosXML."/$repositorioArquivos/$qualArquivo"); 
				$p_cnt = count($xml->NOME);
				
		$corLinha1 = "239,239,239";/* cinza claro */
		$corLinha2 = "242,242,242";/* cinza claro */
		$corLinhaIdentificacao = "200,220,255";/* azul claro */

		$pdf->SetFont('arial','',10);
		$pdf->SetY("-2");

/* -- [ CABEǁLHO ] -- */ 

        $pdf->Cell(0,5,'XAMALEON - Soodle v. 0.1',0,0,'L');
        $pdf->Cell(0,5,'Recursos complementares '.$tipoRelatorio.' - Relat�rio',0,1,'R');
        $pdf->Cell(0,0,'',1,1,'L');
 
        $pdf->Ln(8);    
 
        $pdf-> SetFont('arial','B',10);
        $pdf->SetFillColor(122,122,122);

/* -- [ MATR̓ULA ] -- */ 

	    $pdf->SetFont('Arial','',12);
	    $pdf->SetFillColor($corLinhaIdentificacao); 
	    $pdf->Cell(0,6,corrigeleitura($_MATRICULA)." : $xml->IDENTIFICACAO",0,1,'L',true);
	    $pdf->Ln(4);

/* -- [ APROVADO ] -- */ 

				switch ($xml->APROVADO){
							case 0:
								$xml->APROVADO = $_NAO;
								break;
							case 1:
								$xml->APROVADO = $_SIM;
								break;
							}
	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,"$_APROVADO : $xml->APROVADO",0,1,'L',true);
	    $pdf->Ln(0);
			
/* -- [ NOME ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha2);
	    $pdf->Cell(0,5,"$_NOME : ".corrigeleitura($xml->NOME)."",0,1,'L',true);
	    $pdf->Ln(0);

		
/* -- [ EMAIL ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,"$_EMAIL : $xml->EMAIL",0,1,'L',true);
	    $pdf->Ln(0);		

/* -- [ SEXO ] -- */
 
				switch ($xml->SEXO){
							case 0:
								$xml->SEXO = $_MASCULINO;
								break;
							case 1:
								$xml->SEXO = $_FEMININO;
								break;
							}
	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha2);
	    $pdf->Cell(0,5,"$_SEXO : $xml->SEXO",0,1,'L',true);
	    $pdf->Ln(0);

/* -- [ RESPONSAVEL ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,"$_RESPONSAVEL : ".corrigeleitura($xml->RESPONSAVEL)."",0,1,'L',true);
	    $pdf->Ln(0);

/* -- [ NOME DA MAE ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha2);
	    $pdf->Cell(0,5,corrigeleitura($_NOME_MAE)." : ".corrigeleitura($xml->NOME_DA_MAE)."",0,1,'L',true);
	    $pdf->Ln(0);
	
					
/* -- [ OFICINA ] -- */ 

				switch ($xml->OFICINA->TIPO){
							case 0:
								$xml->OFICINA->TIPO = $_ESPORTES;
								break;
							case 1:
								$xml->OFICINA->TIPO = $_ARTES;
								break;
							case 2:
								$xml->OFICINA->TIPO = corrigeleitura($_CIENCIAS);
								break;
							case 3:
								$xml->OFICINA->TIPO = $_LITERATURA;
								break;
							case 4:
								$xml->OFICINA->TIPO = $_ESTUDOS_SOCIAIS;
								break;
							}
	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,$_OFICINA .":". $xml->OFICINA->TIPO,0,1,'L',true);
	    $pdf->Ln(0);
			
/* -- [ HORARIO/PERIODO ] -- */ 

							switch ($xml->HORARIO){
							case 0:
								$xml->HORARIO = corrigeleitura($_MANHA);
								break;
							case 1:
								$xml->HORARIO = $_TARDE;
								break;
							case 2:
								$xml->HORARIO = $_NOITE;
								break;
							}
	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha2);
	    $pdf->Cell(0,5,corrigeleitura($_HORARIO_PERIODO) .":". $xml->HORARIO,0,1,'L',true);
	    $pdf->Ln(0);
			
/* -- [ ESCOLARIDADE ] -- */ 

							switch ($xml->ESCOLARIDADE){
							case 0:
								$xml->ESCOLARIDADE = corrigeleitura($_ANALFABETO);
								break;
							case 1:
								$xml->ESCOLARIDADE = corrigeleitura($_PRIMARIO_INCOMPLETO);
								break;
							case 2:
								$xml->ESCOLARIDADE = corrigeleitura($_PRIMARIO_COMPLETO);
								break;
							case 3:
								$xml->ESCOLARIDADE = corrigeleitura($_GINASIO_INCOMPLETO);
								break;
							case 4:
								$xml->ESCOLARIDADE = corrigeleitura($_GINASIO_COMPLETO);
								break;
							case 5:
								$xml->ESCOLARIDADE = corrigeleitura($_SEG_GRAU_INCOMPLETO_AC);
								break;
							case 6:
								$xml->ESCOLARIDADE = corrigeleitura($_SEG_GRAU_COMPLETO_AC);
								break;
							case 7:
								$xml->ESCOLARIDADE = corrigeleitura($_SEG_GRAU_INCOMPLETO_TC);
								break;
							case 8:
								$xml->ESCOLARIDADE = corrigeleitura($_SEG_GRAU_COMPLETO_TC);
								break;
							case 9:
								$xml->ESCOLARIDADE = corrigeleitura($_TERC_GRAU_INCOMPLETO);
								break;
							case 10:
								$xml->ESCOLARIDADE = corrigeleitura($_TERC_GRAU_COMPLETO);
								break;
							case 11:
								$xml->ESCOLARIDADE = corrigeleitura($_POS_CURSANDO);
								break;
							case 12:
								$xml->ESCOLARIDADE = corrigeleitura($_POS_CONCLUIDO);
								break;
							case 13:
								$xml->ESCOLARIDADE = corrigeleitura($_MESTRADO_CURSANDO);
								break;
							case 14:
								$xml->ESCOLARIDADE = corrigeleitura($_MESTRADO_CONCLUIDO);
								break;
							case 15:
								$xml->ESCOLARIDADE = corrigeleitura($_DOUTORADO_CURSANDO);
								break;
							case 16:
								$xml->ESCOLARIDADE = corrigeleitura($_DOUTORADO_CONCLUIDO);
								break;
							case 17:
								$xml->ESCOLARIDADE = corrigeleitura($_MBA_CURSANDO);
								break;
							case 18:
								$xml->ESCOLARIDADE = corrigeleitura($_MBA_CONCLUIDO);
								break;
							}
	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,$_ESCOLARIDADE .": ". $xml->ESCOLARIDADE,0,1,'L',true);
	    $pdf->Ln(0);
		
/* -- [ TELEFONE ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha2);
	    $pdf->Cell(0,5,"$_TELEFONE : $xml->TELEFONE",0,1,'L',true);
	    $pdf->Ln(0);
			
/* -- [ ENDERECO ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,corrigeleitura($_ENDERECO)." : ".corrigeleitura($xml->ENDERECO)."",0,1,'L',true);
	    $pdf->Ln(0);
		
/* -- [ BAIRRO ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha2);
	    $pdf->Cell(0,5,"$_BAIRRO : ".corrigeleitura($xml->BAIRRO)."",0,1,'L',true);
	    $pdf->Ln(0);
			
/* -- [ CIDADE ] -- */ 

	    $pdf->SetFont('Times','',8);
	    $pdf->SetFillColor($corLinha1);
	    $pdf->Cell(0,5,"$_CIDADE : ".corrigeleitura($xml->CIDADE)."",0,1,'L',true);
	    $pdf->Ln(0);	
	}
	$i++;
	}
        $pdf-> Output("$diretorioArmazenamentoPdf/$nomeParaPdf.pdf");
		$nomeParaPdf = "$nomeParaPdf.pdf";
		print "<center>";
			montaMenu();
			$MJO->NOTB('class='.$COR1.' cellpadding="4" cellspacing="0" width="753"');
				$MJO->NTR('colspan="1" align="RIGHT" vAlign="top" class='.$COR4.'');
					$o = new printConteudo(''.$MJO->imagensTag("$CFG->iconePDF","","48","48","").'');
				$MJO->NCTR();	
				$MJO->NTR('colspan="1" align="center" vAlign="top" class='.$COR1.'');
			$MJO->NOTB('cellpadding="4" cellspacing="0" style="border:solid 1px;border-color:#dddddd" width="553"');
				$MJO->NTR('colspan="1" align="center" vAlign="top" class='.$COR4.'');
					$o = new printConteudo('<b id="destaque5">'.$_ARQUIVO_CRIADO_SUCESSO.'</b>');
				$MJO->NCTR();	
				$MJO->NTR('colspan="1" align="center" vAlign="top" class='.$COR1.'');
					$MJO->imagensTag($recurso="$CFG->imagemLogoMSG");
				$MJO->NCTR();	
				$MJO->NTR('colspan="1" align="center" vAlign="top" class='.$COR2.'');
					$o = new printConteudo('<b id="destaque3"><a class="link1" target="_blank" href='.$diretorioArmazenamentoPdf.'/'.$nomeParaPdf.'>'.$_VISUALIZAR_ARQUIVO.'</a></b>');
				$MJO->NCTB();	
				$MJO->NCTB();	
				print "</center>";
}else{ // BLOQUEIA O ACESSO
	print "<div class=\"div\" align=\"center\">$ACESSO_NEGADO</div>";
}
print "<br/>";
$MJO->fim($INCLUDE,$tema);	
	
?>