<?php

// ========================================//
// RSS
// ========================================// 
// display featured post thumbnails in WordPress feeds
function ciar_insert_thumb_feed() {
    global $post;
    $output = '';
    if ( has_post_thumbnail( $post->ID ) ) {
        $thumbnail_ID = get_post_thumbnail_id( $post->ID );
        $thumbnail = wp_get_attachment_image_src( $thumbnail_ID, 'ciar_thumb_feed' );
        $output .= '<media:content xmlns:media="http://search.yahoo.com/mrss/" medium="image" type="image/jpeg"';
        $output .= ' url="'. $thumbnail[0] .'"';
        $output .= ' width="'. $thumbnail[1] .'"';
        $output .= ' height="'. $thumbnail[2] .'"';
        $output .= ' />';
    }
    echo $output;
}
add_action( 'rss2_item', 'ciar_insert_thumb_feed' );

function ciar_insert_content_feed($content) {
  global $post;
  $content =  trim(strip_tags(substr(get_the_content(), 0,600))) . '...';
  return $content;
}
add_filter('the_excerpt_rss', 'ciar_insert_content_feed');