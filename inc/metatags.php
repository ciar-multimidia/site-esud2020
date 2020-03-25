<?php 
echo '<!--[if lt IE 9]><script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><![endif]-->';
echo '<meta http-equiv="Content-Type" content="text/html; image/svg+xml; charset='.get_bloginfo('charset').' ">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">';

echo '<meta property="og:site_name" content="'.get_bloginfo('name').'">';

$appIDfb = '';
$profileIDfb = '';

//////////////// FACEBOOK
echo '<meta property="fb:admins" content="">';
echo '<meta property="article:author" content="'.$profileIDfb.'"/>';
echo '<meta property="article:publisher" content="'.$profileIDfb.'"/>';
echo '<meta property="fb:profile_id" content="'.$profileIDfb.'"';  
echo '<meta property="fb:app_id" content="'.$appIDfb.'">'; 

///////////////// LOGO
echo '<meta itemprop="logo" content="'.get_template_directory_uri().'/screenshot.png">';


//////////////// definir metatags se eh home ou outras pags
if(is_home() || is_front_page()) {

    echo '<meta name="description" content="'.get_bloginfo('description').'">';
    echo '<meta itemprop="description" content="'.get_bloginfo('description').'">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:title" content="'.get_bloginfo('name').'">';
    echo '<meta property="og:url" content="'.get_bloginfo('url').'">';
    echo '<meta property="og:description" content="'.get_bloginfo('description').'">';

    echo '<meta property="og:image" content="'.get_template_directory_uri().'/screenshot.png">';

    echo '<meta name="twitter:domain" content="'.get_bloginfo('url').'">';
    echo '<meta name="twitter:card" content="'.get_bloginfo('description').'">';
    echo '<meta name="twitter:description" content="'.get_bloginfo('description').'">';
    echo '<meta name="twitter:url" content="'.get_bloginfo('url').'">';
    echo '<meta name="twitter:title" content="'.get_bloginfo('name').'">';
    echo '<meta name="twitter:image" content="'.get_template_directory_uri().'/screenshot.png">';

    echo '<meta itemprop="url" content="'.get_bloginfo('url').'">';
    echo '<link rel="canonical" href="'.get_bloginfo('url').'">';
    echo '<meta property="og:url" content="'.get_bloginfo('url').'">';
   
} elseif(is_search()) {

    echo '<meta name="description" content="Busca por: '.get_search_query().'">';
    echo '<meta itemprop="description" content="Busca por: '.get_search_query().'">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:title" content="Busca por: '.get_search_query().'">';
    echo '<meta property="og:url" content="'.get_bloginfo('url').'/?s='.get_search_query().'">';
    echo '<meta property="og:description" content="Busca por: '.get_search_query().'">';

    echo '<meta property="og:image" content="'.get_template_directory_uri().'/screenshot.png">';

    echo '<meta name="twitter:domain" content="'.get_bloginfo('url').'/?s='.get_search_query().'">';
    echo '<meta name="twitter:card" content="Busca por: '.get_search_query().'">';
    echo '<meta name="twitter:description" content="Busca por: '.get_search_query().'">';
    echo '<meta name="twitter:url" content="'.get_bloginfo('url').'/?s='.get_search_query().'">';
    echo '<meta name="twitter:title" content="Busca por: '.get_search_query().'">';
    echo '<meta name="twitter:image" content="'.get_template_directory_uri().'/screenshot.png">';

    echo '<meta itemprop="url" content="'.get_bloginfo('url').'/?s='.get_search_query().'">';
    echo '<link rel="canonical" href="'.get_bloginfo('url').'/?s='.get_search_query().'">';
    echo '<meta property="og:url" content="'.get_bloginfo('url').'/?s='.get_search_query().'">';

} elseif(is_singular('')) {

    echo '<meta property="og:title" content="'; echo single_post_title(); echo '">';
    echo '<meta name="twitter:title" content="'; echo single_post_title(); echo '">';
    echo '<meta itemprop="name" content="'; echo single_post_title(); echo '">';

    echo '<meta property="og:description" content="'; echo pegar_resumo(''); echo '">';
    echo '<meta name="description" content="'; echo pegar_resumo(''); echo '">';
    echo '<meta itemprop="description" content="'; echo pegar_resumo(''); echo '">';
    echo '<meta name="twitter:description" content="'; echo pegar_resumo(''); echo '">';
    echo '<meta name="twitter:card" content="'; echo pegar_resumo(''); echo '">';

    echo '<meta property="article:published_time" content="'.get_the_time('c').'">';

    echo '<meta name="twitter:domain" content="'.get_bloginfo('url').'">';
    echo '<meta name="twitter:url" content="'.get_the_permalink().'">';

    echo '<meta property="og:url" content="'.get_the_permalink().'">';
    echo '<meta name="twitter:url" content="'.get_the_permalink().'">';
    echo '<meta itemprop="url" content="'.get_the_permalink().'">';
    echo '<link rel="canonical" href="'.get_the_permalink().'">';

    echo '<meta property="og:type" content="article">';
    echo '<meta property="article:published_time" content="'.get_the_time('Y-m-d h:i').'">';

        if (is_singular('post')) {
            $category = get_the_category(); if($category[0]) { 
                echo '<meta property="article:section" content="'.$category[0]->cat_name.'">';
            } 
            $posttags = get_the_tags(); if ($posttags) {
                echo '<meta property="article:tag" content="'; 
                    foreach($posttags as $tag) : echo $tag->name . ','; endforeach; 
                echo '">';
            }            
        }

        // facebook
        echo '<meta property="article:author" content="" />';
        echo '<meta property="article:publisher" content="" />';   

        if ( ! has_post_thumbnail( $post->ID ) ) {
            echo '<meta property="og:image" content="'.get_template_directory_uri().'/screenshot.png">';
            echo '<meta name="twitter:image" content="'.get_template_directory_uri().'/screenshot.png">';
            echo '<meta itemprop="image" content="'.get_template_directory_uri().'/screenshot.png">';
        } else {
            echo '<meta property="og:image" content="'; while( have_posts() ) : the_post(); echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); endwhile; echo '">';
            echo '<meta name="twitter:image" content="'; while( have_posts() ) : the_post(); echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); endwhile; echo '">';
            echo '<meta itemprop="image" content="'; while( have_posts() ) : the_post(); echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); endwhile; echo '">';
        }
}


//////////////// facebook script
echo '<div id="fb-root"></div>';
echo "<script async defer crossorigin=\"anonymous\" src=\"//connect.facebook.net/en_US/sdk.js#xfbml=1&autoLogAppEvents=1&version=v4.0&appId=".$profileIDfb."\"></script>";


//////////////// wp head para itens de plugins
wp_head();


/////////////// favicon
if (has_site_icon()) {
    echo '<link rel="icon" type="image/png" href="'.get_site_icon_url().'?vs=2" />';
    echo '<link rel="icon" type="mage/x-icon" href="'.get_site_icon_url().'?vs=2" />';
    echo '<link rel="apple-touch-icon-precomposed" href='.get_site_icon_url().'?vs=2" />';
    echo '<link rel="shortcut icon" type="image/png" href="'.get_site_icon_url().'?vs=2" />';
    echo '<link rel="shortcut icon" type="mage/x-icon" href="'.get_site_icon_url().'?vs=2" />';
    echo '<meta name="msapplication-TileImage" content="'.get_site_icon_url().'?vs=2" />';   
}
