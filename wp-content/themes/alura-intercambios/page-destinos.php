<?php get_header(); ?>

    <form action="#" class="container-alura formulario-pesquisa-paises">
        <h2>Conheça nossos destinos</h2>
        <select name="paises" id="paises">
            <?php
            $paises = get_terms(array('taxonomy' => 'paises'));
            ?>
            <option value="">--Selecione--</option>
            <?php
            foreach ($paises as $pais):?>
                <option value="<?= $pais->name ?>" <?= !empty($_GET['paises']) &&
                $pais->name === $_GET['paises'] ? 'selected': '' ?>><?= $pais->name ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Pesquisar">
    </form>


<?php

if (!empty($_GET['paises'])) {
    $taxQuery = array(
        array(
            'taxonomy' => 'paises',
            'field' => 'name',
            'terms' => $_GET['paises']
        )
    );
}
$args = array(
    'post_type' => 'destinos',
    'tax_query' => !empty($taxQuery) ? $taxQuery : ''
);
$destinos = new WP_Query($args);
if ($destinos->have_posts()):
    echo '<main class="page-destinos">';
    echo '<ul class="lista-destinos container-alura">';
    while ($destinos->have_posts()):
        $destinos->the_post();
        if (have_posts()):?>
            <li class="col-md-3 destinos">
            <?php
            the_post_thumbnail();
            the_title('<p class="titulo-destino">','</p>');
            the_excerpt();
            the_terms(get_the_ID(),'paises');
        endif;
        ?>
        </li>
    <?php
    endwhile;
    echo '</ul>';
    echo '</main>';
endif;
wp_reset_postdata();
get_footer();