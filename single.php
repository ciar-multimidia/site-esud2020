<?php get_header(); 

	echo '<div class="container">';

		if (have_posts()) {
			while (have_posts()) : the_post();
				echo '<article id="area-conteudo">';
				echo '<time datetime="'.get_the_time('Y-m-d h:i').'" itemprop="datePublished">Em '.get_the_time('d/m/Y').'</time>';
				
				the_content();
				echo '</article>';
			endwhile;
		}
		
	echo '</div>';

get_footer();