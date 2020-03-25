<?php get_header(); 

	echo '<div class="colmaior">';

		if (is_category()) {
			echo '<h1 class="titulo-arquivos">categoria <strong>'; echo single_cat_title(); echo '</strong></h1>';

		}

		elseif (is_tag()) {
			echo '<h1 class="titulo-arquivos">tag <strong>'; echo single_tag_title(); echo '</strong></h1>';

		}
		elseif (is_day()) {
			echo '<h1 class="titulo-arquivos">posts de <strong>'.get_the_time('j \d\e F \d\e Y').'</strong></h1>';

		}
		elseif (is_month()) {
			echo '<h1 class="titulo-arquivos">posts de <strong>'.get_the_time('F \d\e Y').'</strong></h1>';

		}
		elseif (is_year()) {
			echo '<h1 class="titulo-arquivos">posts de <strong>'.get_the_time('Y').'</strong></h1>';
		}


	echo '</div>';


get_footer(); ?>