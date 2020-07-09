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

	
function montaMenu(){
	global $MJO,$CFG,$ROTA,$INCLUDE,$NomeModulo,$_ADMINISTRADOR,$_INICIO,$_CONFIGURACOES,$_EXIBIR_RELATORIO,$_IMPRESSAO,$_BUSCA,$_AJUDA,$_SAIR,$COR1,$COR3;
	
						$MJO->NOTB('class='.$COR1.' cellpadding="8" width="753"');			
						$MJO->NTR('class='.$COR3.' colspan="7"');
							$MJO->imagensTag($CFG->caminhoIcones.$CFG->iconeIdiomaAtual);
							$o = new printConteudo($_ADMINISTRADOR);
								if (!file_exists($INCLUDE."/modulos/".$NomeModulo)) {
									$conteudo3 = "<img src=\"$CFG->iconeRelatorioDesativados\"><br/><b id=\"destaque3\">$_EXIBIR_RELATORIO</b>";								
								}else{
									$conteudo3 = "<a class=\"link2\" title=\"$_EXIBIR_RELATORIO\" href=\"$ROTA/modulos/$NomeModulo/paginacao.php?verifica=true\"><img src=\"$CFG->iconeRelatorio\"><br/>$_EXIBIR_RELATORIO</a>";
								}
						$MJO->NCTR();
						$MJO->NTR('class='.$COR3.' colspan="7"');

						$conteudo = array();
						$conteudo[1] = "<a class=\"link2\" title=\"$_INICIO\" href=\"$ROTA/index.php?verifica=true\"><img src=\"$CFG->iconeInicial\"><br/> $_INICIO</a>";
						$conteudo[2] = "<a class=\"link2\" title=\"$_CONFIGURACOES\" href=\"$ROTA/modulos/mostra_configuracoes.php?verifica=true\"><img src=\"$CFG->iconeMenuConfig\"><br/>$_CONFIGURACOES</a>";
						$conteudo[3] = $conteudo3;
						$conteudo[4] = "<a class=\"link2\" title=\"$_IMPRESSAO\" href=\"$ROTA/modulos/mostra_cadastros.php?verifica=true\"><img src=\"$CFG->iconeImpressao\"><br/>$_IMPRESSAO</a>";
						$conteudo[5] = "<a class=\"link2\" title=\"$_BUSCA\" href=\"$ROTA/modulos/busca_nomes.php?verifica=true\"><img src=\"$CFG->iconeBusca\"><br/>$_BUSCA</a>";
						$conteudo[6] = "<a class=\"link2\" title=\"$_AJUDA\" href=\"$ROTA/modulos/mostra_ajuda.php?verifica=true\"><img src=\"$CFG->iconeMenuAjuda \"><br/> $_AJUDA</a>";
						$conteudo[7] = "<a class=\"link2\" title=\"$_SAIR\" href=\"$ROTA/index.php?sair=true\"><img src=\"$CFG->iconeSair\"><br/> $_SAIR</a>";
						
						
						$MJO->arrayCelulas($conteudo);						
						$MJO->NCTB();
					$GOOGLE = new AvisoDivPop;
					//print $GOOGLE->blocoLink728();
					print $GOOGLE->anuncio728();
						return;
}
?>