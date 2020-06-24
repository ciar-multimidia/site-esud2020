<?php  

if (empty(get_field('pgespecial'))) {

	echo '<footer id="rodape-site" class="container"'.(is_front_page() ? ' style="margin-top:0"' : '').'>';
		get_template_part('img/linha2');

		/////////// AREA DE MARCAS
		echo '<h1>Realização</h1>';

		echo '<div class="marcas">';
			echo '<img src="'.get_template_directory_uri().'/img/marca-unirede.png" alt="Unirede">';
			echo '<img src="'.get_template_directory_uri().'/img/marca-ufg60anos.png" alt="Universidade Federal de Goiás - 60 anos de educação">';
		echo '</div>';



		/////////// FORMULARIO
		echo '<h2>Fale conosco</h2>';
		echo '<p>Tire suas dúvidas ou peça informações pelo endereço <a href="mailto:esud2020@ciar.ufg.br" target="_blank">esud2020@ciar.ufg.br</a> ou pelo formulário abaixo.</p>';

		echo do_shortcode('[contact-form-7 id="19"]');



		/////////// MIDIAS SOCIAIS E CREDITOS
		echo '<div class="midias-e-creditos">';
			echo '<div class="midias">';
				echo '<h1>ESUD nas mídias</h1>';
				echo '<a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>';
				echo '<a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>';
				echo '<a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>';
			echo '</div>';

			echo '<div class="creditos">';
				echo '<div>';
					echo '<h1>Desenvolvimento</h1>';
					echo '<a href="https://producao.ciar.ufg.br" target="_blank"><img src="'.get_template_directory_uri().'/img/marca-publicaciar.png" alt="Publicação Ciar UFG"></a>';
				echo '</div>';

				echo '<div>';
					echo '<h1>Suporte</h1>';
					echo '<p><a href="https://www.ciar.ufg.br/equipes#aba6" target="_blank">Equipe Tecnológico Ciar</a></p>';
				echo '</div>';
			echo '</div>';
		echo '</div>';

	echo '</footer>';
	
}

get_template_part('inc/linguas');
get_template_part('inc/popups');

echo '</main>';
wp_footer();

echo '</body>';
echo '</html>';