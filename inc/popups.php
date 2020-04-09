<?php

if( have_rows('criador_popups','option') ) {
	while (have_rows('criador_popups','option')) : the_row();

		$tipo = get_sub_field('atuacao');
		$ifimg = get_sub_field('habilitar_imagem_destaque');
		$ifform = get_sub_field('habilitar_captura_de_leads');

		// condicionais
		$home = '';
		$paginas = '';
		$posts = '';
		$cursos = '';
		$cursosSingle = '';
		$shop = '';

		$mostrar_home = get_sub_field('mostrar_home');
		$mostrar_paginas = get_sub_field('mostrar_paginas');
		$mostrar_paginasID = get_sub_field('filtrar_paginas');

		if ($mostrar_home == true) { $home = is_front_page(); }
		
		if ($mostrar_paginas == true) { 
			if ($mostrar_paginasID == true) {
				$paginas = is_page($mostrar_paginasID);
			} else {
				$paginas = is_page();
			}
		} 


		// tags de layout
		$descricao = get_sub_field('descricao');


		//////////////// APLICANDO LAYOUT
		if ($home || $paginas) {

			echo '<div class="modal popup" id="'.$tipo.'">';

					if ($descricao) { echo $descricao;}

			echo '</div>';
		}

	endwhile; 
}


