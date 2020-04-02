<?php

// ========================================//
// SETUP THEME
// ========================================// 

add_action( 'after_setup_theme', 'ciar_setup' );
function ciar_setup() {

    // seguranca
    add_filter( 'style_loader_src', 'ciar_scripts_remove_versao', 9999 );
    add_filter( 'script_loader_src', 'ciar_scripts_remove_versao', 9999 );
    add_filter( 'style_loader_src', 'ciar_removequerystring', 10, 2 );
    add_filter( 'script_loader_src', 'ciar_removequerystring', 10, 2 );

    // limpeza
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_generator_tag' );
    remove_action( 'wp_head', 'wp_resource_hints', 2);
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rest_output_link_wp_head');
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'wlwmanifest_link');

    // configuracoes de layout
    global $content_width;
    if ( ! isset( $content_width ) ) { $content_width = 680; }

    add_action( 'wp_enqueue_scripts', 'ciar_load_styles', 999 );
    add_action( 'wp_footer', 'ciar_load_scripts_footer', 999 );
    add_filter( 'excerpt_more', 'ciar_excerpt_more' );
    add_filter( 'excerpt_length', 'ciar_excerpt_length', 999 );
    add_filter( 'embed_oembed_html', 'ciar_wrapembed', 99, 4);
    add_filter( 'body_class', 'ciar_body_class' );
    add_filter( 'the_content', 'ciar_fancybox_img');

    include_once(get_template_directory().'/func/shortcodes.php' );
    include_once(get_template_directory().'/func/thumbs.php' );
    include_once(get_template_directory().'/func/feed-rss.php' );

    include_once(get_template_directory().'/func/blocks.php' );


    // menus
    register_nav_menus( array( 
      'primary' => __( 'Menu Global'),
    ) );

    // gutenberg
    add_theme_support( 'align-full' );
    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name'      => __( 'Normal', 'site-esud2020-ciar' ),
          'shortName' => __( 'N', 'site-esud2020-ciar' ),
          'size'      => 16,
          'slug'      => 'normal',
        )
      )
    );

}

include_once(get_template_directory().'/func/admin.php' );



// ========================================//
// SCRIPTS E STYLES
// ========================================// 
function ciar_load_styles() {  
    // layout
    $urltheme = get_template_directory_uri();
    $urlCDN = '//cdn.jsdelivr.net/npm';
    wp_enqueue_style('layout', $urltheme . '/css/layout.css', array(), '', 'all', null); 
    
    // jquery
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', $urlCDN . '/jquery@3.4.1/dist/jquery.min.js', array(), '' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', $urlCDN . '/jquery-migrate@3.1.0/dist/jquery-migrate.min.js', array(), '' );

    // scripts
    wp_enqueue_script( 'fancybox', $urlCDN . '/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery-core'), '', true);
    wp_enqueue_script( 'scripts', $urltheme . '/js/scripts.js', array('jquery-core'), '', true);
} 


function ciar_load_scripts_footer() { 
  // configuracoes da barra de admin, caso exista
  if (is_admin_bar_showing()) {
    echo '<style>';
    echo '#wpadminbar {z-index: 9000}';
    echo '@media screen and (max-width: 782px) { html { margin-top: 0 !important; } body{ margin-top: 46px !important; } }';
    echo '@media screen and (max-width: 600px) { #wpadminbar {position: fixed} }';
    echo '</style>'; 
  }
}


// ========================================//
// RESUMO
// ========================================// 
function ciar_excerpt_more( $more ) { return '...'; }
function ciar_excerpt_length( $length ) { return 50; }

function pegar_resumo($out_excerpt) {
  while (have_posts()):the_post(); 
    $out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", strip_tags(get_the_excerpt())); 
    echo apply_filters("the_excerpt_rss", $out_excerpt); 
  endwhile;
}



// ========================================//
// SEGURANCA
// ========================================// 
// remover versão do wp nos scripts 
function ciar_scripts_remove_versao( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// retirar query strings de scripts e css
function ciar_removequerystring( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}


// ========================================//
// MENU
// ========================================// 
function ciar_menu($local) { 
  wp_nav_menu ( array( 
    'theme_location' => $local, 
    'menu' => $local, 
    'container' => '', 
    'container_class' => '', 
    'container_id' => '', 
    'menu_class' => '', 
    'menu_id' => '', 
    'echo' => true, 
    'fallback_cb' => 'wp_page_menu', 
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id="lista-menu">%3$s</ul>', 
    'depth' => 0, 
    'walker' => '' 
  )); 
}


// ========================================//
// BODY CLASS
// ========================================// 
function ciar_body_class($classes) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
    return $classes;
}


// ========================================//
// ADD FANCYBOX EM IMAGENS COM LINK
// ========================================// 
function ciar_fancybox_img($content) {
    global $post;
    $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 class="afczoom" data-fancybox="galeria"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}



// ========================================//
// EMBED
// ========================================// 
function ciar_wrapembed($html, $url, $attr, $post_id) {
      return '<div class="wrapmidia">' . $html . '</div>';
}



// ========================================//
// PAGINACAO
// ========================================// 
function ciar_paginacao($pages = '', $range = 2) {  
     $showitems = $range * 2;  
     global $paged;
     if(empty($paged)) $paged = 1;
   
     if($pages == '') {

         global $wp_query;
         $pages = $wp_query->max_num_pages;

         if(!$pages) {
             $pages = 1;
         }
     }   

     if(1 != $pages) {
         echo "<div class='paginacao"; 
          if ($paged < $pages && $showitems < $pages) echo ' com-avanco';
         echo "'>\n";

         echo "<div class='inicio'><span>Página ".$paged." de ".$pages."</span></div>\n";

         if ($paged < $pages && $showitems < $pages) echo "<div class='paginas'>"; // quando ha bt avancar

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><i class='fal fa-long-arrow-left'></i> Anterior</a>";
         if($paged > 3 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>1</a> <span class='dots'>...</span>";

         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
             }
         }

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<span class='dots'>...</span> <a href='".get_pagenum_link($pages)."'>".$pages."</a>";

         if ($paged < $pages && $showitems < $pages) echo "</div><div class='avancar'><a href='".get_pagenum_link($paged + 1)."'>Próximo <i class='fal fa-long-arrow-right'></i></a></div>"; 

         echo "\n</div>";
     }
}


// ========================================//
// DESABILITAR GUTENBERG
// ========================================// 
function ciar_disable_editor( $id = false ) {

    $excluded_templates = array(
    );

    $excluded_ids = array(
        get_option( 'page_on_front' )
    );

    if( empty( $id ) )
        return false;

    $id = intval( $id );
    $template = get_page_template_slug( $id );

    return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

//// Disable Gutenberg by template
function ciar_disable_gutenberg( $can_edit, $post_type ) {

    if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
        return $can_edit;

    if( ciar_disable_editor( $_GET['post'] ) )
        $can_edit = false;

    return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ciar_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ciar_disable_gutenberg', 10, 2 );

//// Disable Classic Editor by template
function ciar_disable_classic_editor() {

    $screen = get_current_screen();
    if( 'page' !== $screen->id || ! isset( $_GET['post']) )
        return;

    if( ciar_disable_editor( $_GET['post'] ) ) {
        remove_post_type_support( 'page', 'editor' );
    }

}
add_action( 'admin_head', 'ciar_disable_classic_editor' );

