<?php get_header(); 

	echo '<div class="container">';

		if (have_posts()) {
			while (have_posts()) : the_post();
				echo '<article id="area-conteudo">';
				the_content();
				echo '</article>';
			endwhile;
		}
		
	echo '</div>';

get_footer();