<?php
//This forces the Newsletter Category to redirect to the latest post in this category
$args = array(
    'posts_per_page' => '1',
    'post_type' => 'post',
    'category_name' => 'newsletters'
);
$post = get_posts($args);
if($post){
    $url = get_permalink($post[0]->ID);
    wp_redirect( $url, 301 );
    exit;
}
?>
