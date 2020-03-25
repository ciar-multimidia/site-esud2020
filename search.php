<?php get_header(); 

		echo 'Resultados da busca <strong>'; echo get_search_query(); echo '</strong>';

		if (have_posts()) {
			while (have_posts()) : the_post();
				get_template_part('content');
			endwhile;
		}

get_footer();