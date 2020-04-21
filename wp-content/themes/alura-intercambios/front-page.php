<?php
get_header();
require_once 'inc/query_banner.php';
?>
    <main>
        <div class="imagem-banner">
            <?= alura_intercambios_query_banner()['thumbnail']; ?>
        </div>
        <div class="texto-banner-dinamico">
            <span id="texto-banner"></span>
        </div>
    </main>
<?php get_footer(); ?>