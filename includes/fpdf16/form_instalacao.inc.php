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
//import_request_variables("pg");
extract($_GET);
extract($_POST);
if(!isset($EMPRESA_NOME)){
	$EMPRESA_NOME = "";
}
if(!isset($nomeEvento)){
	$nomeEvento = "";
}
if(!isset($preRequisitos)){
	$preRequisitos = "";
}
if((isset($_GET["idiomaInstala"]))||(isset($_POST["cria"]))){
	include("idiomas/$lang/main.lang.php");
	include("idiomas/$lang/instala.lang.php");

if(isset($_POST["cria"])){
$usuarioC = md5($usuario);
$senhaC = md5($senha);
if(!isset($EMPRESA_NOME,$AUTOR1_Email,$producao,$repositorioArquivos,$SenhaGravada,$metaDescricao,$metaPalavrasChave,$metaAutor,$ROTA,$INCLUDE,$idioma)){
	$EMPRESA_NOME = '$EMPRESA_NOME';
	$AUTOR1_Email = '$AUTOR1_Email';
	$producao = '$producao';
	$autoCadastro = '$autoCadastro';
	$repositorioArquivos = '$repositorioArquivos';
	$numeroRegistrosPaginaRelatorio = '$numeroRegistrosPaginaRelatorio';
	$SenhaGravada = '$SenhaGravada';
	$metaDescricao = '$metaDescricao';
	$metaPalavrasChave = '$metaPalavrasChave';
	$metaAutor = '$metaAutor';
	$ROTA = '$ROTA';
	$INCLUDE = '$INCLUDE';
	$idioma = '$idioma';
	$tema = '$tema';
	$NomeModulo = '$NomeModulo';
	$usuarioGravado = '$usuarioGravado';
	$tagTituloSite = '$tagTituloSite';
	$linkRedirecionaRetorno = '$linkRedirecionaRetorno';
	$nomeEvento = '$nomeEvento';
	$preRequisitos = '$preRequisitos';
}
$conteudo=<<<eof
<?php
/*-----------------------------------------------------------------------------------*
@       NÃO REMOVA AS INFORMAÇÕES A SEGUIR
@		SISTEMA DE GERENCIAMENTO DE CONTEÚDOS PARA SITES INTEGRADO AO MOODLE, 
@		VENDA DE CURSOS E MATRÍCULAS AUTOMATIZADAS 
@		{SOORDLE - SGCS - CMS}    	 
@		Idioma: Português- Brasil	            						 
@		Autor: 	Oliveira M.J.N
@		Contato: <soordle@gmail.com>							                     								 	 
@       ® todos os direitos reservados desde 2007  
@       VERSÃO 0.1.1     								 
@
@ NOTICE OF COPYRIGHT ---------------------------------------------------------------*                   
@
@ Copyright (C) 2007  Oliveira M.J.N  http://www.eadgames.com.br        
@ Copyright (C) 3012  Oliveira M.J.N  http://www.soordle.org                    
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
@-------------------------------- [ LEIA COM ATENÇÃO AS REGRAS A SEGUIR ] ------------*/                                                                       
/* -- [ NÃO ADIOCIONE NENHUMA LINHA DEPOIS DESTE COMENTRIO VOCÊ PODE APENAS EDITAR OS CONTEÚDOS DAS VARIVEIS NESTE DOCUMENTO ] -- */
/* -- [ O BOM FUNCIONAMENTO DE ALGUNS RECURSOS DEPENDEM DA EXATA FORMATAÇÃO DAS LINHAS ABAIXO, NÃO FAÇA QUEBRA DE LINHAS ] -- */
/* -- [ $producao -> valor (SIM) para produção (sistema está Online) ] -- */
/* -- [ $producao -> valor (NAO) para desenvolvimento (localhost off line) ] -- */
/* -- [ $autoCadastro -> valor (UM) exibe formulário na página inicial permitindo assim a realização de auto-cadastros ] -- */
/* -- [ $autoCadastro -> valor (ZERO) os cadastros serão realizados apenas por um administrador ] -- */
$idioma = "$idiomaSelecionado";
$EMPRESA_NOME = "$nomeEmpresa";
$AUTOR1_Email = "$emailAutor";
$producao = "$producaoSelecionado";
$tema = "$temaSelecionado";
$NomeModulo = "$NomeModuloSelecionado";
$repositorioArquivos = "armazem";
$numeroRegistrosPaginaRelatorio = 10;
$autoCadastro = "$autoCadastroSelecionado"; 
$SenhaGravada = "$senhaC";
$usuarioGravado = "$usuarioC";
$metaDescricao = "$descricao";
$metaPalavrasChave = "$palavrasChave";
$metaAutor = "$nomeCompleto";
$tagTituloSite = "$tituloSelecionado";
$linkRedirecionaRetorno = "$linkRedirecionaRetornoSelecionado";
$nomeEvento = "$nomeEventoSelecionado";
$preRequisitos = "$preRequisitosSelecionado";
if($producao != "NAO"){
	$ROTA = "$caminhoVirtualProducao";
	$INCLUDE = "$caminhoFisicoProducao";
	}else{
	$ROTA = "$caminhoVirtualDesenvolvimento";
	$INCLUDE = "$caminhoFisicoDesenvolvimento";
}
?>
eof;
$arquivo=("config.inc.php");
$arq=fopen($arquivo,"w");
fputs($arq,$conteudo);
fclose ($arq);
$FLUTUA = new AvisoDivPop;
			$FLUTUA->jsAviso("closeAlertaDiv","idiomaDiv","divAlertaFlutuante","","c2",$_INSTALACAO_CONCLUIDA,"c1");
			 print " <META HTTP-EQUIV=\"Refresh\" Content=2;URL=\"index.php\"> ";
}
?>

<script type="text/javascript">
function checkPWD(obj) {
        var txt = document.getElementById("senhaTXT");
        var pwd = document.getElementById("senhaPWD");
        
        if (obj.id == "senhaTXT"){ 
                txt.style.display = "none";
                pwd.style.display = "block";
                pwd.focus();
                return;
        }
        if (!obj.value){
                        pwd.style.display = "none";
                txt.style.display = "block";
                        txt.focus();        
        }
}
</script>
    <script type="text/javascript">
        function MudaTipo(senha){
            if(document.getElementById('mostra_senha').checked == true){
                if(senha.type == 'password'){
                    campo = document.createElement('input');
                    campo.type = 'text';
                    campo.name = senha.name;
                    campo.id = senha.id;
                    campo.value = senha.value;
                    senha.parentNode.insertBefore(campo,senha);
                    senha.parentNode.removeChild(senha);
                }
            }else{
                if(senha.type == 'text'){
                    campo = document.createElement('input');
                    campo.type = 'password';
                    campo.name = senha.name;
                    campo.id = senha.id;
                    campo.value = senha.value;
                    senha.parentNode.insertBefore(campo,senha);
                    senha.parentNode.removeChild(senha);
            }
        }
    }
    </script>
<?php
$FORM->abreForm("index.php","POST","login","login","");
					$FORM->mostraInput2("hidden","","cria","true","","","","","");	
					$FORM->mostraInput2("hidden","","lang","$lang","","","","","");	
					$FORM->mostraInput2("hidden","","idiomaInstala","$idiomaInstala","","","","","");	
	$MJO->NOTB('width="100%" cellpadding="0"');
		$MJO->NTR('align="left" class="c3"');
		$o = new printConteudo("<img src=\"temas/pantanal/imagens/xmlsgm.png\" border=\"0\">");
	$MJO->NCTB();
	$MJO->NOTB('width="753" cellpadding="2" cellspacing="0"');
		$MJO->NTR('align="center" class="c3"');
			$o = new printConteudo("<b id='destaque11'>$_INSTALACAO</b>");
		$MJO->NCTR();
		$MJO->NTR('align="center" class="c1"');
			$o = new printConteudo("<br>");
			$MJO->NOTB('width="753" cellpadding="4" border="0" cellspacing="0"');
				$MJO->NTR('align="left" colspan="2" class="c9"');
				$o = new printConteudo($_INSTALACAO_PADRAO);				
				$MJO->NCTR();				
				$F->input('class="c7"','<b id="destaque5">'.$_USUARIO.'</b>','class="c7"','TYPE="TEXT" name="usuario" value="admin" size="20" onfocus=this.value=""');
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_USUARIO_INSTALA);				
				$MJO->NCTR();
				$F->inputSenha('class="c1"','<b id="destaque5">'.$_SENHA.'</b>','class="c1"',"admin",'<b id="destaque3">'.$_MOSTRAR.'</b>');
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_SENHA_INSTALA);				
				$MJO->NCTR();
			
				$MJO->NHR('colspan="2" class="c1"');
																
				$MJO->NTR('align="left" class="c7"');
				$o = new printConteudo("<b id='destaque5'>$_IDIOMA</b>");
				$MJO->NTD('align="left" class="c7"');
				$o = new printConteudo('<img src="imagens/icones/'.$idiomaInstala.'.png"> <a class="link2" href="javascript:history.back();">'.$_ESCOLHER_OUTRO.'</a>');				
					$idiomaSelecionado = $lang;
					$FORM->mostraInput2("hidden","","idiomaSelecionado","$idiomaSelecionado","","","","","");		
				$MJO->NCTR();
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_IDIOMA_INSTALA);				
				$MJO->NCTR();				
				$MJO->NHR('colspan="2" class="c1"');
								
				$F->input('class="c7"','<b id="destaque5">'.$_NOME_DA_EMPRESA.'</b>','class="c7"','TYPE="TEXT" name="nomeEmpresa" value="'.$_CAMPO_SUA_EMPRESA.'" size="60" onfocus=this.value=""');
				$F->input('class="c1"','<b id="destaque5">'.$_EMAIL.'</b>','class="c1"','TYPE="TEXT" name="emailAutor" value="'.$_CAMPO_SEU_EMAIL.'" size="60" onfocus=this.value=""');
				$F->input('class="c7"','<b id="destaque5">'.$_NOME.'</b>','class="c7"','TYPE="TEXT" name="nomeCompleto" value="'.$_CAMPO_NOME_COMPLETO.'" size="60" onfocus=this.value=""');
				
				$MJO->NHR('colspan="2" class="c1"');	
							
				$F->input('class="c7"','<b id="destaque5">'.$_TITULO_SITE.'</b>','class="c7"','TYPE="TEXT" name="tituloSelecionado" value="XAMALEON V.0.1" size="60" onfocus=this.value=""');
				$F->input('class="c1"','<b id="destaque5">'.$_PALAVRA_CHAVE.'</b>','class="c1"','TYPE="TEXT" name="palavrasChave" value="'.$_CAMPO_PALAVRA_CHAVE.'" size="60" onfocus=this.value=""');
				
				$MJO->NTR('align="left" class="c7"');
				$o = new printConteudo("<b id='destaque5'>$_DESCRICAO</b>");
				$MJO->NTD('align="left" class="c7"');			
					print "<textarea cols='57' name='descricao' rows='3' onfocus=this.value=''>$_CAMPO_DESCRICAO</textarea>";
				$MJO->NCTR();	
							
				$MJO->NHR('colspan="2" class="c1"');	

				$F->input('class="c1"','<b id="destaque5">'.$_NOME_EVENTO.'</b>','class="c1"','TYPE="TEXT" name="nomeEventoSelecionado" value="ex:Curso Soordle" size="60" onfocus=this.value=""');
				
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_NOME_EVENTO_INSTALA);				
				$MJO->NCTR();

				$F->input('class="c1"','<b id="destaque5">'.$_PRE_REQUISITOS.'</b>','class="c1"','TYPE="TEXT" name="preRequisitosSelecionado" value="ex:Pós graduação" size="60" onfocus=this.value=""');
				
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_PRE_REQUISITO_INSTALA);				
				$MJO->NCTR();
								
				$MJO->NTR('align="left" class="c7"');
				$o = new printConteudo("<b id='destaque5'>$_AUTO_CADASTRO</b> <b id='destaque10'>[ $_SIM ]</b>");
				$MJO->NTD('align="left" class="c7"');
				print "<select name=\"autoCadastroSelecionado\"><option value=\"UM\">$_SELECIONE_OPCAO</option><option value=\"UM\">$_PERMITE_AUTOCADASTRO</option><option value=\"ZERO\">$_NAO_PERMITE_AUTOCADASTRO</option></select>";
				$MJO->NCTR();				
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_AUTO_CADASTRO_INSTALA);				
				$MJO->NCTR();						


				$F->input('class="c1"','<b id="destaque5">'.$_LINK_RETORNO.'</b>','class="c1"','TYPE="TEXT" name="linkRedirecionaRetornoSelecionado" value="http://www.owpoga.com" size="60" onfocus=this.value=""');
				
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_LINK_RETORNO_INSTALA);				
				$MJO->NCTR();						

				$MJO->NHR('colspan="2" class="c1"');	

				$MJO->NTR('align="left" class="c7"');
				$o = new printConteudo("<b id='destaque5'>LOCALHOST</b> <b id='destaque10'>[ $_SIM ]</b>");
				$MJO->NTD('align="left" class="c7"');
				print "<select name=\"producaoSelecionado\"><option value=\"NAO\">$_SELECIONE_OPCAO</option><option value=\"NAO\">$_DESENVOLVIMENTO / LOCALHOST</option><option value=\"SIM\">$_PRODUCAO / ONLINE</option></select>";
				$MJO->NCTR();
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_PRODUCAO_INSTALA);				
				$MJO->NCTR();				
				$MJO->NHR('colspan="2" class="c1"');	
	
			$caminhoVirtual = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
			$caminhoFisico = $_SERVER["DOCUMENT_ROOT"].dirname($_SERVER['PHP_SELF']);
					
				$MJO->NTR('align="left" colspan="2" class="c7"');
				print ('<b ID="destaque9">'.$_ATENCAO.'</b>: '.$_VERIFIQUE_DADOS_CORRETOS.'');
				$MJO->NCTR();
				$F->input('class="c1"','<b id="destaque5">'.$_CAMINHO_FISICO.'</b><b id="destaque10">['.$_DESENVOLVIMENTO.']</b>','class="c1"','TYPE="TEXT" name="caminhoFisicoDesenvolvimento" value="'.$caminhoFisico.'" size="60"');
				$F->input('class="c1"','<b id="destaque5">'.$_CAMINHO_VIRTUAL.'</b><b id="destaque10">['.$_DESENVOLVIMENTO.']</b>','class="c1"','TYPE="TEXT" name="caminhoVirtualDesenvolvimento" value="'.$caminhoVirtual.'" size="60"');
				$MJO->NCTR();
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_CAMINHO_DESENVOLVIMENTO_INSTALA);				
				$MJO->NCTR();				
				$MJO->NHR('colspan="2" class="c1"');	
				$F->input('class="c1"','<b id="destaque5">'.$_CAMINHO_FISICO.'</b><b id="destaque10">['.$_PRODUCAO.']</b>','class="c1"','TYPE="TEXT" name="caminhoFisicoProducao" value="'.$caminhoFisico.'" size="60"');
				$F->input('class="c1"','<b id="destaque5">'.$_CAMINHO_VIRTUAL.'</b><b id="destaque10">['.$_PRODUCAO.']</b>','class="c1"','TYPE="TEXT" name="caminhoVirtualProducao" value="'.$caminhoVirtual.'" size="60"');
				$MJO->NTR('align="left" colspan="2" class="c6"');
				$o = new printConteudo($_DICA_CAMINHO_PRODUCAO_INSTALA);				
				$MJO->NCTR();				
				$MJO->NTR('colspan="2" align="center" class="c12"');	
					$FORM->mostraInput2("hidden","3","temaSelecionado","pantanal","2","input2","","","");				
					$FORM->mostraInput2("hidden","8","NomeModuloSelecionado","oficina","2","input2","","","");				
					$FORM->mostraInput2("hidden","3","repositorioXml","repositorio_xml","2","input2","","","");				
					$FORM->mostraBotao("BUTTON","enviar","enviar","$_CADASTRAR");				
			$MJO->NCTB();
	$MJO->NCTB();
$FORM->fecha_form();
	$MJO->NOTB('width="100%" cellpadding="0"');
		$MJO->NTR('align="RIGHT" class="c3"');
		$o = new printConteudo("<A HREF=\"http://www.eadgames.com.br\" target=\"_blank\"><img src=\"temas/pantanal/imagens/xmlsgm.png\" border=\"0\" WIDTH=\"320\" HEIGHT=\"60\"></a>");
	$MJO->NCTB();
}else{
					function mLink($var1,$var2,$var3){
						$vLink ="<a href=\"?idiomaInstala=$var1&lang=$var2&idiomaSelecionado=$var3\">";
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
					
	$MJO->NOTB('width="100%" cellpadding="0"');
		$MJO->NTR('align="left" class="c3"');
		$o = new printConteudo("<img src=\"temas/pantanal/imagens/xmlsgm.png\" border=\"0\">");
	$MJO->NCTB();
	print "<center><br/><br/>";	
	$MJO->NOTB('width="753" class="c1" cellpadding="8" cellpadding="0"');
				$MJO->NTR('colspan="0" align="left" vAlign="top" class="c1"');
				$o = new printConteudo("<b id='destaque3'>Sistema de cadastro e gerenciamento de matrículas em base de dados XML</b><br/><br/>");
				$MJO->NTR('align="left" class="c1" vAlign="top"');
				$o = new printConteudo("<b id='destaque10'>As traduções utilizadas neste sistema foram realizadas usando a ferramenta de tradução do 
				Google<br>Isto é, podem existir muitos erros!</b>");
				$MJO->NCTR();	
				$MJO->NTR('align="left" class="c1" vAlign="top"');				
				$o = new printConteudo("Por favor selecione um idioma para a instalação<br/>");				
				$MJO->NCTR();	
				$MJO->NTR('align="left" class="c1" vAlign="top"');
				$o = new printConteudo("<b id='destaque3'>System of registration and enrollment management in XML database</b>");
				$o = new printConteudo("<b id='destaque10'>The translations used in this system were conducted using the translation tool
				Google <br> That is, there may be many errors!</b>");
				$MJO->NCTR();	
				$MJO->NTR('align="left" class="c1" vAlign="top"');
				$o = new printConteudo("Please select a language to install.");
				$MJO->NCTR();	
				$MJO->NTR('align="center" class="c1" vAlign="top"');					
					$mostraImg = array();
					$mostraImg[1] = mLink("1g","pt_br","0").mImg("1g","Português Brasil - Brazilian Portuguese");
					$mostraImg[2] = mLink("2g","es_es","2").mImg("2g","Spanish - Espanha/Spain");
					$mostraImg[3] = mLink("3g","en_us","3").mImg("3g","English -  USA");
					$mostraImg[4] = mLink("4g","en_gb","1").mImg("4g","English - GB");
					$mostraImg[5] = mLink("5g","de_de","4").mImg("5g","Deutch -  Alemanha/Germany");
					$mostraImg[6] = mLink("6g","fr_fr","5").mImg("6g","French -  Francês French");
					$mostraImg[7] = mLink("7g","it_it","6").mImg("7g","Italiano -  Italiano/Italy");
					$mostraImg[8] = mLink("8g","fi_fi","7").mImg("8g","Finlandês -  Finlandês Finland");
					arrayCelulas($mostraImg);
$MJO->NCTB();	
print "<br/><br/></center>";
	$MJO->NOTB('width="100%" cellpadding="0"');
		$MJO->NTR('align="RIGHT" class="c3"');
	$MJO->NCTR();
		$MJO->NTR('align="RIGHT" class="c3"');
		$o = new printConteudo("<A HREF=\"http://www.eadgames.com.br\" target=\"_blank\"><img src=\"temas/pantanal/imagens/xmlsgm.png\" border=\"0\" WIDTH=\"320\" HEIGHT=\"60\"></a>");
	$MJO->NCTB();
}
?>