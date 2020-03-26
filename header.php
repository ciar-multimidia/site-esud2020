<?php 
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title>'; 
		echo wp_title( '|', true, 'right' ); echo get_bloginfo('name');
	echo '</title>';
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="'.join(' ',get_body_class()).'">';

// get_template_part('inc/menu','mobile');

echo '<main>';


	echo '<header id="cabecalho" class="'.(is_front_page() ? 'home' : '').'">';
		get_template_part('img/grafismo');

		echo '<nav class="container" id="menu">'; ciar_menu('primary'); echo '</nav>';


		echo '<div class="area-cabecalho">';
		if (is_front_page()) {
			
			echo '<div class="imagem-fundo" style="background-image:url('.get_template_directory_uri().'/img/fundo-001.png);"></div>';

			echo '<div class="container">';
				echo '<div class="marca">';
					echo '<img src="'.get_template_directory_uri().'/img/marca.svg" alt="Marca do ESUD 2020">';
					echo '<h1>Caminhos para a educação em rede:<br>Políticas Públicas e Gestão Institucional</h1>';
				echo '</div>';
			echo '</div>';
			
		} else {

			echo '<div class="container">';
				the_title();
			echo '</div>';

		}
		echo '</div>';

	echo '</header>';


	echo '<section id="conteudo" class="container">';
