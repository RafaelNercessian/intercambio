<?php get_header();
?>
<main class="container-alura">
    <h1>Blog da Alura Intercâmbios</h1>
    <ul>
        <?php
        while (have_posts()) : the_post();
            ?>
            <li class="row">
            <a href="<?php the_permalink(); ?>">

                    <?php
                    the_post_thumbnail('post-thumbnail', array(
                        'class' => 'col-md-2 col-xs-12 imagem-blog'
                    ));
                    the_title('<h2 class="titulo-post">', '</h2>');
                    the_excerpt();
                    ?>
                    <p class="autor">Autor: <?= get_the_author(); ?> - <?= get_the_date("d/m/Y"); ?></p>

            </a>
            </li>
        <?php
        endwhile;
        ?>
    </ul>
</main>
<?php get_footer() ?>