<?php 
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title>'; 
		echo wp_title( '|', true, 'right' ); echo get_bloginfo('name');
	echo '</title>';
echo '<meta name="theme-color" content="#00568B" />';	
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="'; echo join(' ',get_body_class()); if (get_field('pgespecial')) { echo ' '.get_field('pgespecial'); }
echo '">';

echo '<main>';


	echo '<header id="cabecalho" class="'.(is_front_page() ? 'home' : '').'">';
		get_template_part('img/grafismo1');

		echo '<nav class="container" id="menu" role="navigation">'; 
			echo '<h1 id="nome-evento"><a href="'.get_bloginfo('url').'">ESUD 2020</a></h1>';
			echo '<button id="botao-menu" aria-expanded="false">&#9776; Navegação</button>';
			ciar_menu('primary'); 
		echo '</nav>';


		echo '<div class="area-cabecalho">';
		if (is_front_page()) {

			echo '<div class="imagem-fundo" style="background-image:url(';
				$fundo = get_field('fundo_cabecalho');

				if( !empty($fundo) ) {
									
					$getRandom = $fundo[ array_rand( $fundo ) ];
					$imgAleatoria = $getRandom['imagem' ];

					echo $imgAleatoria['sizes']['large'];

				} else {
					echo get_template_directory_uri().'/img/fundo-001.png';
				}
			echo ');"></div>';




			echo '<div class="container">';
				echo '<div class="marca">';
					echo '<img src="'.get_template_directory_uri().'/img/marca.svg" alt="Marca do ESUD 2020">';
					echo '<h1>Caminhos para a educação em rede:<br>Políticas Públicas e Gestão Institucional</h1>';
				echo '</div>';
			echo '</div>';
			
		} else {

			echo '<div class="container">';
				echo '<h1 class="titulo-pagina">';
					if (is_home() && ! is_front_page()) {
						echo 'Notícias';
					} else {
						echo get_the_title();
					}
				echo '</h1>';
			echo '</div>';

		}
		echo '</div>';

	echo '</header>';

