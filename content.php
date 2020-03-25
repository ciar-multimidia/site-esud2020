<?php
$idpost = get_the_ID();
$permalink = get_the_permalink();
$titulo = get_the_title();


$itemtype = '';
if (is_home() || is_single()) { $itemtype = 'Article'; } else { $itemtype = 'CreativeWork'; }

echo '<div itemscope itemtype="http://schema.org/'.$itemtype.'" id="postid-'.$idpost.'" '; post_class(); echo '>';

echo '</div>';

