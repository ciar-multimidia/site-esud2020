<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$my_query = new WP_Query( array('post_type' => 'post', 'paged' => $paged) ); 

echo '<ul class="lista-noticias">';
	if ( $my_query->have_posts()) {
		while ( $my_query->have_posts() ) : $my_query->the_post();

		$idpost = get_the_ID();
		$permalink = get_the_permalink();
		$titulo = get_the_title();
		$resumo = trim(strip_tags(mb_substr(get_the_excerpt(), 0,340)));

			echo '<li id="post-'.$idpost.'"'; post_class(); echo '>';
				echo '<header class="titulo-noticia">';
					echo '<h3>'.$titulo.'</h3>';
					echo '<time datetime="'.get_the_time('Y-m-d h:i').'" itemprop="datePublished">Em '.get_the_time('d/m/Y').'</time>';
				echo '</header>';

				echo '<article>';
					echo '<p>'.$resumo.'</p>';
				echo '</article>';

				echo '<a href="'.$permalink.'" class="link"></a>';
			echo '</li>';

		endwhile;
	} wp_reset_query(); 
echo '</ul>';
