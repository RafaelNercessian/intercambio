<?php get_header();

if (have_posts()):
    ?>
    <main class="main-sobre-nos">
    <?php
    while (have_posts()): the_post();
        if (has_post_thumbnail()):
            the_post_thumbnail('post-thumbnail', array(
                'class' => 'imagem-sobre-nos'
            ));
        echo '<div class="conteudo container-alura">';
        the_title('<h2>','</h2>');
        the_content();
        echo '</div>';
        endif;
    endwhile;
    ?>
    </main>
    <?php
endif;
get_footer();