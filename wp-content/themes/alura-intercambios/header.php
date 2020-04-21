<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container-alura">
        <?php
        the_custom_logo();
        ?>

        <nav>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-navegacao',
                    'menu_id' => 'menu-principal',
                )
            );
            ?>
        </nav>
    </div>
</header>