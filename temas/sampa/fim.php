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
$MJO->NOTB('border="0" cellspacing="0" cellpadding="8" width="100%"');
	$MJO->NTR('class='.$COR1.' WIDTH="60%" align="CENTER"');
			?>													
			<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
			<form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
			<input type="hidden" name="receiverEmail" value="vendas@eadgames.com.br" />
			<input type="hidden" name="currency" value="BRL" />
			<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/209x48-doar-cinza-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
			</form>
			<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
			<?php
$MJO->NTD('align="CENTER" class='.$COR1.'');	
$MJO->MTD("$CFG->iconeDevelop");			
$MJO->NCTB();
$MJO->NOTB('class="topo" border="0" cellspacing="0" cellpadding="8"');
	$MJO->NTR('align="right"');	
		$o = new printConteudo($MJO->imagensTagLink("http://www.eadgames.com.br","_blank","Site do desenvolvedor",$CFG->imagemLogomarca,"logo","320","60",""));
	$MJO->NCTR();
	$MJO->NTR('class='.$COR2.' align="center"');
		$o = new printConteudo($COPY);
$MJO->NCTB();
?>
<br/><a rel="license" href="http://creativecommons.org/licenses/GPL/2.0/deed.pt"><img alt="Licen硠Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/GPL/2.0/88x62.png" /></a><br/><br/>Este trabalho foi licenciado com uma Licença <br/><a rel="license" href="http://creativecommons.org/licenses/GPL/2.0/deed.pt" target="_blank">Creative Commons - GNU General Public License</a>.<br/><br/>
<?php
print "</div></html>";	

?>