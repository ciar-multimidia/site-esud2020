<?php
// ========================================//
// HABILITANDO BLOCOS ESPECIFICOS
// ========================================//
add_filter( 'allowed_block_types', 'ciar_allowed_block_types' );
function ciar_allowed_block_types( $allowed_blocks ) {
 	// lista de blocos: https://wpdevelopment.courses/a-list-of-all-default-gutenberg-blocks-in-wordpress-5-0/
	return array(
		'core/spacer',
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/media-text',
		'core/html',
		'core/gallery',
		'core/quote',
		'core/separator',
		'core/shortcode',
		'core/columns',
		'core/more',
		'core-embed/twitter',
		'core-embed/youtube',
		'core-embed/facebook',
		'core-embed/instagram',
		'core-embed/spotify',
		'core-embed/vimeo',

		// jetpack
		'jetpack/contact-form',
		'jetpack/gif',
	);
}


// ========================================//
// CRIANDO MINHA CATEGORIA DE BLOCOS
// ========================================//
function ciar_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'afcwebdesign-pg',
                'title' => __( 'Blocos Personalizados', 'site-esud2020-ciar' ),
                'icon'  => 'star-filled',
            )
        )
    );
}
// add_filter( 'block_categories', 'ciar_block_categories', 10, 2 );


// ========================================//
// CADASTRANHO BLOCOS - ADVANCED CUSTOM FIELDS
// ========================================//
// add_action('acf/init', 'ciar_register_blocks');
function ciar_register_blocks() {
	if( function_exists('acf_register_block_type') ) {

		///////////// BOTAO
		acf_register_block_type(array(
			'name'				=> 'afcblock-botao',
			'title'				=> __('Botão'),
			'description'		=> __('Adicionar botão com tamanho e cores personalizadas.'),
			'mode' 				=> 'edit',
			'render_callback' 	=> 'afcblock_botao',
			'category'			=> 'afcwebdesign-pg',
			'icon'				=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="#606469" d="M154.149 488.438l-41.915-101.865-46.788 52.8C42.432 465.345 0 448.788 0 413.5V38.561c0-34.714 41.401-51.675 64.794-26.59L309.547 274.41c22.697 24.335 6.074 65.09-27.195 65.09h-65.71l42.809 104.037c8.149 19.807-1.035 42.511-20.474 50.61l-36 15.001c-19.036 7.928-40.808-1.217-48.828-20.71zm-31.84-161.482l61.435 149.307c1.182 2.877 4.117 4.518 6.926 3.347l35.999-15c3.114-1.298 4.604-5.455 3.188-8.896L168.872 307.5h113.479c5.009 0 7.62-7.16 3.793-11.266L41.392 33.795C37.785 29.932 32 32.879 32 38.561V413.5c0 5.775 5.935 8.67 9.497 4.65l80.812-91.194z"/></svg>',
			'keywords'			=> array( 'botao', 'link', 'button' ),
			'supports' 			=> array( 
				'align' =>  false,
				'mode' => true,
				'multiple' => true,
				'html' => false
			 ),
		));	
	}
}