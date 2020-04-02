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
					
					echo '<h1 class="titulo">A cidade</h1>';

					echo '<div class="col">';
						echo '<article>';
							echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.</p>';
							echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.</p>';

							echo '<ul class="links-importantes">';
								echo '<li><a href="">Como chegar</a></li>';
								echo '<li><a href="">Hospedagem</a></li>';
								echo '<li><a href="">Turismo</a></li>';
							echo '</ul>';
						echo '</article>';

						echo '<div class="wrap-link"><a href="#" class="saiba-mais maior branco">Ver programação</a></div>';
					echo '</div>';

				echo '</div>';
			echo '</session>';
		}

    endwhile;
}







// ========================================//
// INSCRICOES
// ======================================= //
// echo '<session class="sessao-home container" id="inscricoes">';


// 	echo '<div class="col">';
// 		echo '<article>';
// 			echo '<h1 class="titulo">Inscrições</h1>';
// 			echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.</p>';
// 			echo '<div class="wrap-link"><a href="#" class="saiba-mais turquesa">Quero me inscrever</a></div>';
// 		echo '</article>';
// 	echo '</div>';

// echo '</session>';




// ========================================//
// NOTICIAS
// ======================================= //
// echo '<session class="sessao-home container" id="noticias">';
// 	$pagNoticias = get_permalink(get_option('page_for_posts'));

// 	echo '<div class="wrap-mais-noticias">';
// 		echo '<h1 class="titulo">Notícias</h1>';
// 		echo '<a href="'.$pagNoticias.'" class="saiba-mais">ver todas</a>';
// 	echo '</div>';

// 	get_template_part('inc/loop-lista-noticias');

// echo '</session>';

get_footer();