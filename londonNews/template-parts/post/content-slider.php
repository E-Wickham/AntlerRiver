<?php

$args = array(
    'post_type' => array('attachment'),
    'posts_per_page' => -1,
    'meta_key' => 'featured_img',
    'meta_value' => 1 /* or true */
);
$my_posts = new WP_Query($args);
if ($my_posts->have_posts()) {
    while ($my_posts->have_posts()) : $my_posts->the_post();
        var_dump($my_posts);
    endwhile;
}