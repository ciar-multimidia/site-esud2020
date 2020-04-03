<?php get_header(); 

if( have_rows('sessoes_home') ) {
    while ( have_rows('sessoes_home') ) : the_row();

		// ========================================//
		// O EVENTO
		// ======================================= //
		if( get_row_layout() == 'evento' ) {
			$titulo = get_sub_field('titulo');
			$descricao = get_sub_field('descricao');
			$botao = get_sub_field('botao');

			echo '<session class="sessao-home container" id="o-evento">';
				if($titulo) { echo '<h1 class="titulo">'.$titulo.'</h1>'; }

				echo '<div class="col sobre">';
					if ($descricao) { 
						echo '<article>'.$descricao.'</article>';
					} 
					if ($botao) {
						echo '<div class="wrap-link"><a href="'.$botao['url'].'" target="'.$botao['target'].'" class="saiba-mais">'.$botao['title'].'</a></div>';	
					}
					
				echo '</div>';

				if (have_rows('texto_destaque')) {
					echo '<div class="col infos"><h2>';
					while (have_rows('texto_destaque')) : the_row();
						$texto = get_sub_field('texto');
						echo '<span>'.$texto.'</span>';
					endwhile;
					// ESUD 2020, Goiânia G0, 11 a 13 de nov<span class="abrevia">embro</span>, na UFG
					echo '</h2></div>';
				}

			echo '</session>';
		} 


		// ========================================//
		// A CIDADE
		// ======================================= //
		if( get_row_layout() == 'cidade' ) {
			$fundoImagem = get_sub_field('imagens_fundo');
			$titulo = get_sub_field('titulo');
			$descricao = get_sub_field('descricao');
			$botao = get_sub_field('botao');

			echo '<session class="sessao-home" id="a-cidade">';

				echo '<div class="imagem-fundo dir" style="background-image:url(';

					if ($fundoImagem) {

						$getRandom = $fundoImagem[ array_rand( $fundoImagem ) ];
						$imgAleatoria = $getRandom['imagem' ];

						echo $imgAleatoria['sizes']['large'];
					}

				echo ');"></div>';

				get_template_part('img/linha1');

				echo '<div class="container">';
					
					if($titulo) { echo '<h1 class="titulo">'.$titulo.'</h1>'; }

					echo '<div class="col">';

						if ($descricao || $links) { 
							echo '<article>'; 
								if($descricao) { echo $descricao; }

								if( have_rows('links_importantes') ) {
									echo '<ul class="links-importantes">';
									while ( have_rows('links_importantes') ) : the_row();
										$link = get_sub_field('link');
										echo '<li><a href="'.$link['url'].'" target="'.$link['target'].'">'.$link['title'].'</a></li>';
									endwhile;
									echo '</ul>';
								}
							echo '</article>';
						} 

						if ($botao) {
							echo '<div class="wrap-link"><a href="'.$botao['url'].'" target="'.$botao['target'].'" class="saiba-mais maior branco">'.$botao['title'].'</a></div>';	
						}
					echo '</div>';

				echo '</div>';
			echo '</session>';
		}



		// ========================================//
		// INSCRICOES
		// ======================================= //
		if( get_row_layout() == 'inscricoes' ) {
			$titulo = get_sub_field('titulo');
			$descricao = get_sub_field('descricao');
			$botao = get_sub_field('botao');

			echo '<session class="sessao-home container" id="inscricoes">';
				echo '<div class="col">';
						if($titulo) { echo '<h1 class="titulo">'.$titulo.'</h1>'; }

						if ($descricao) { 
							echo '<article>'.$descricao.'</article>';
						} 
						if ($botao) {
							echo '<div class="wrap-link"><a href="'.$botao['url'].'" target="'.$botao['target'].'" class="saiba-mais turquesa">'.$botao['title'].'</a></div>';	
						}
				echo '</div>';

			echo '</session>';

		}




		// ========================================//
		// INSCRICOES
		// ======================================= //
		if( get_row_layout() == 'noticias' ) {
			echo '<session class="sessao-home container" id="noticias">';
				$pagNoticias = get_permalink(get_option('page_for_posts'));

				echo '<div class="wrap-mais-noticias">';
					echo '<h1 class="titulo">Notícias</h1>';
					echo '<a href="'.$pagNoticias.'" class="saiba-mais">ver todas</a>';
				echo '</div>';

				get_template_part('inc/loop-lista-noticias');

			echo '</session>';
		}

    endwhile;
}


get_footer();