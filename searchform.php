<?php

echo '<div id="busca">';
	echo '<button class="bt-fechar"><i class="fal fa-times"></i></button>';
	echo '<form method="get" class="form-busca wrap-div" action="'.esc_url(home_url('/')).'" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">';
			echo '<input class="termos-busca" itemprop="query-input" type="search" name="s" placeholder="O que você procura?">';
			echo '<input type="hidden" name="post_type" value="post">';
		echo '<button class="buscar" type="submit"><i class="fas fa-search"></i></button>';
	echo '</form>';
echo '</div>';
