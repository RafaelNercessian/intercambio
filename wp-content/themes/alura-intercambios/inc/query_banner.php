<?php

function alura_intercambios_query_banner()
{
    $args = array(
        'post_type' => 'banner',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        if (has_post_thumbnail()):
            return array(
                'thumbnail' => get_the_post_thumbnail(),
                'texto_principal' => get_post_meta(get_the_ID(), 'texto_principal')[0],
                'descricao' => get_post_meta(get_the_ID(), 'descricao')[0]
            );
        endif;
    endwhile;
}