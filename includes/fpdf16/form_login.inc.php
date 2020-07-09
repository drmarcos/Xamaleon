<?php
/*-----------------------------------------------------------------------------------*
@       NÏ REMOVA AS INFORMǕES A SEGUIR
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
if((!isset($_GET["admin"])) && ($autoCadastro == "UM")){
	
					
			$MJO->NOTB('class='.$COR1.' cellpadding="2" width="753"');
					$MJO->NTR('colspan="3" class='.$COR1.'');
					$o = new printConteudo($_TEXTO_EXPLICA_FORM);
					$GOOGLE = new AvisoDivPop;
					print $GOOGLE->anuncio728();
					
					if($preRequisitos != ""){						
					$o = new printConteudo("<b>".$_PRE_REQUISITOS."</b>: "."  ".$preRequisitos." ");
					}
						include("modulos/$NomeModulo/form_cadastro.php");		
					$MJO->NCTB();
				$MJO->NHR('colspan="3" class='.$COR1.'');

}
					
function formLogin(){
global $FORM,$MJO,$HTML,$F,$CFG,$_ADMINISTRACAO,$_TEXTO_INICIAL,$_PROJETO_SOORDLE,$_TEXTO_PROJETO_SOORDLE,$tema,$autoCadastro,$_OCULTAR,$_TEXTO_EXIBIR_GNU,$_CONTROLE_ACESSO_SISTEMA,$_USUARIO,$_SENHA,$_ACESSAR,$COR1,$COR3,$COR6,$COR7,$_TEXTO_GNUGPL;	

if($autoCadastro != "UM"){	
$FORM->abreForm("index.php","POST","login","login","");
		$FORM->mostraInput2("HIDDEN","20","verifica","verifica","true","255","input2","","","");		

	$MJO->NOTB('class='.$COR1.' cellpadding="2" width="753"');
		$MJO->NTR('class='.$COR1.' width="70%"');
			$o = new printConteudo($_TEXTO_INICIAL);
			$MJO->NTD('class='.$COR1.'');
				$o = new printConteudo('<img src="'.$CFG->iconeCadeado.'">');
			$MJO->NTD('class='.$COR1.'');						
					$MJO->NOTB('cellpadding="2" cellspacing="0" width="200"');
						$MJO->NTR('colspan="2" class='.$COR3.'');
							$o = new printConteudo($_CONTROLE_ACESSO_SISTEMA);		
						$MJO->NCTR();
						$F->input($COR6,'<b id="destaque5">'.$_USUARIO.'</b>',$COR6,'TYPE="TEXT" name="nome" size=""');
						$F->input($COR6,'<b id="destaque5">'.$_SENHA.'</b>',$COR6,'TYPE="password" name="senha" size=""');
						$MJO->NTR('colspan="2" align="center" class='.$COR6.' height="30"');												
							$FORM->mostraBotao("BUTTON","enviar","enviar","$_ACESSAR");
					$MJO->NCTB();				
				$MJO->NCTR();
				$MJO->NHR('colspan="3" class='.$COR1.'');					
					$MJO->NTR('colspan="3" class='.$COR1.'');

	print"				
	<script language=\"javascript\"> 												
	function showlayer(layer){
	var myLayer = document.getElementById(layer).style.display;
	if(myLayer==\"none\"){
	document.getElementById(layer).style.display=\"block\";
	} else {
	document.getElementById(layer).style.display=\"none\";
	}
	}
	</script>
	";
					print "<a href=\"#\" class=\"link2\" onclick=\"javascript:showlayer('inicial')\"><img src=$CFG->iconeSoordle><b id=destaque5>$_PROJETO_SOORDLE</b> </a>
					<div id=\"inicial\" style=\"display: none\">".nl2br($_TEXTO_PROJETO_SOORDLE)."</div>";		
				$MJO->NCTR();
				$MJO->NTR('colspan="3" class='.$COR1.'');
					print "<a href=\"#\" class=\"link2\" onclick=\"javascript:showlayer('myName')\"><img src=$CFG->iconeGNU><b id=destaque5> $_TEXTO_EXIBIR_GNU</b> </a>
					<div id=\"myName\" style=\"display: none\">$_TEXTO_GNUGPL</div>";
					
				$MJO->NCTB();
	
$FORM->fecha_form();
return;
}else{
		unset($admin);
if(!isset($_GET["admin"])){	
?>
<!-- Page styles -->
<link type='text/css' href='includes/js/osx/css/demo.css' rel='stylesheet' media='screen' />

<!-- OSX Style CSS files -->
<link type='text/css' href='includes/js/osx/css/osx.css' rel='stylesheet' media='screen' />
<div id='container'>
<div id='content'>
<?php					
	$MJO->NOTB('class='.$COR1.' cellpadding="2" width="100%"');
		$MJO->NTR('align="right" class='.$COR1.' width="70%"');		
		print "<img src=\"$CFG->iconeAdmin\"><a class='osx' href=index.php?admin=true><b id=\"destaque3\">$_ADMINISTRACAO</b></a>";
	$MJO->NCTB();
		print"
		<div id=\"osx-modal-content\">
			<div id=\"osx-modal-title\">$_CONTROLE_ACESSO_SISTEMA</div>
			<div class=\"close\"><a href=\"#\" class=\"simplemodal-close\">x</a></div>
			<div id=\"osx-modal-data\">";
$FORM->abreForm("index.php","POST","login","login","");
		$FORM->mostraInput2("HIDDEN","20","verifica","verifica","true","255","input2","","","");		
	$MJO->NOTB('class='.$COR1.' cellpadding="2" width="450"');
		$MJO->NTR('class='.$COR1.' width="20%"');
		$o = new printConteudo('<img src="'.$CFG->iconeCadeado.'">');
		$MJO->NTD('class='.$COR1.'');
			$MJO->NOTB('class='.$COR1.' cellpadding="2" width="350"');
					$F->input($COR6,'<b id="destaque5">'.$_USUARIO.'</b>',$COR6,'TYPE="TEXT" name="nome" size=""');
					$F->input($COR6,'<b id="destaque5">'.$_SENHA.'</b>',$COR6,'TYPE="password" name="senha" size=""');
				$MJO->NTR('colspan="2" align="center" class='.$COR1.' height="30"');					
					$FORM->mostraBotao("BUTTON","enviar","enviar","$_ACESSAR");
				$MJO->NCTB();	
	$MJO->NCTB();	
$FORM->fecha_form();
?>			
			</div></div></div></div>

<!-- Load JavaScript files -->
<script type='text/javascript' src='includes/js/osx/js/jquery.js'></script>
<script type='text/javascript' src='includes/js/osx/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='includes/js/osx/js/osx.js'></script>
<?php	
	}
if(isset($_GET["admin"])){
$FORM->abreForm("index.php","POST","login","login","");
		$FORM->mostraInput2("HIDDEN","20","verifica","verifica","true","255","input2","","","");		
	$MJO->NOTB('class='.$COR1.' cellpadding="2" width="753"');
		$MJO->NTR('class='.$COR1.' width="70%"');
			$o = new printConteudo($_TEXTO_INICIAL);
			$MJO->NTD('class='.$COR1.'');
				$o = new printConteudo($iconeCadeado);
			$MJO->NTD('class='.$COR1.'');						
					$MJO->NOTB('cellpadding="2" cellspacing="0" width="200"');
						$MJO->NTR('colspan="2" class='.$COR3.'');
							$o = new printConteudo($_CONTROLE_ACESSO_SISTEMA);		
						$MJO->NCTR();
						$F->input($COR6,'<b id="destaque5">'.$_USUARIO.'</b>',$COR6,'TYPE="TEXT" name="nome" size=""');
						$F->input($COR6,'<b id="destaque5">'.$_SENHA.'</b>',$COR6,'TYPE="password" name="senha" size=""');
						$MJO->NTR('colspan="2" align="center" class='.$COR6.' height="30"');					
							$FORM->mostraBotao("BUTTON","enviar","enviar","$_ACESSAR");
					$MJO->NCTB();				
				$MJO->NCTR();
				$MJO->NHR('colspan="3" class='.$COR1.'');					
					$MJO->NTR('colspan="3" class='.$COR1.'');
						$o = new printConteudo("$_TEXTO_GNUGPL");		
	$MJO->NCTB();	
$FORM->fecha_form();

return;	
}	
}
}
print $GOOGLE->anuncio728();
?>