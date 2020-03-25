<?php

// ========================================//
// SHORTCODES - LIMPA
// ========================================// 
function ciar_shortcode_paragraph_fix($content) {  
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

    return $content;
}
add_filter('the_content', 'ciar_shortcode_paragraph_fix');
