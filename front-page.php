<?php get_header(); 

// ========================================//
// O EVENTO
// ======================================= //
echo '<session class="sessao-home container" id="o-evento">';
	echo '<h1 class="titulo">O Evento</h1>';

	echo '<div class="col">';
		echo '<article>';
			echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.</p>';
			echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.</p>';
		echo '</article>';

		echo '<a href="#" class="saiba-mais">Ver programação</a>';
	echo '</div>';

	echo '<div class="col infos">';
		echo '<h2>';
			echo '<span>ESUD 2020</span>';
			echo '<span>Goiânia G0</span>';
			echo '<span>11 a 13 de novembro</span>';
			echo '<span>na UFG</span>';
		echo '</h2>';
	echo '</div>';

echo '</session>';


// ========================================//
// A CIDADE
// ======================================= //
echo '<session class="sessao-home" id="a-cidade">';
	echo '<div class="imagem-fundo dir" style="background-image:url('.get_template_directory_uri().'/img/fundo-002.png);"></div>';
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

			echo '<a href="#" class="saiba-mais maior branco">Ver programação</a>';
		echo '</div>';

	echo '</div>';
echo '</session>';



// ========================================//
// A CIDADE
// ======================================= //
echo '<session class="sessao-home container" id="inscricoes">';


	echo '<div class="col">';
		echo '<article>';
			echo '<h1 class="titulo">Inscrições</h1>';
			echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam voluptatem minima ducimus doloribus odit, et optio facilis odio voluptatum id repellat recusandae ad amet beatae suscipit deserunt laborum sunt.</p>';
			echo '<a href="#" class="saiba-mais turquesa">Quero me inscrever</a>';
		echo '</article>';
	echo '</div>';

echo '</session>';


get_footer();