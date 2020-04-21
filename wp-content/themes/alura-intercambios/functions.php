<?php
require_once 'inc/query_banner.php';

/*Adicionando funções ao tema*/
function alura_intercambios_logo_setup() {
    add_theme_support( 'custom-logo');
    add_theme_support( 'post-thumbnails');
}
add_action( 'after_setup_theme', 'alura_intercambios_logo_setup' );

/*Adicionando scripts e estilos*/
function alura_intercambios_adicionando_scripts() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/dist/bootstrap.min.css');
    wp_enqueue_style('home-css', get_template_directory_uri().'/dist/home.min.css');
    wp_enqueue_style('header-css', get_template_directory_uri().'/dist/header.min.css');
    wp_enqueue_style('blog-css', get_template_directory_uri().'/dist/blog.min.css');
    wp_enqueue_style('sobre-nos-css', get_template_directory_uri().'/dist/sobre_nos.min.css');
    wp_enqueue_style('destinos-css', get_template_directory_uri().'/dist/destinos.min.css');
    wp_enqueue_style('footer-css', get_template_directory_uri().'/dist/footer.min.css');
    wp_enqueue_script('typed-js', get_template_directory_uri().'/dist/typed.min.js', array(), false,true );
    wp_enqueue_script('footer-js', get_template_directory_uri().'/dist/footer.min.js', array('typed-js'), false,true );
    error_log(print_r(alura_intercambios_query_banner(),1));
    wp_localize_script( 'footer-js', 'data', alura_intercambios_query_banner());
}

add_action( 'wp_enqueue_scripts', 'alura_intercambios_adicionando_scripts' );

/*Post type customizado para adicionar vídeos*/
function alura_intercambios_adiciona_video() {

    register_post_type( 'banner',
        array(
            'label' => 'Banner',
            'singular_label' => 'Banner',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'rewrite' => array( 'slug' => 'banner' ),
            'supports' => array('title','thumbnail')
        )
    );
}
add_action( 'init', 'alura_intercambios_adiciona_video' );

/*Colocando campo customizado no banner*/
function alura_intercambio_adicionando_metabox()
{
    add_meta_box(
        'texto_banner',
        'Texto para o banner',
        'alura_intercambio_adicionando_campos_metabox',
        'banner'
    );

}
add_action('add_meta_boxes', 'alura_intercambio_adicionando_metabox');

/*Adicionando campos metabox no banner*/
function alura_intercambio_adicionando_campos_metabox($post)
{
    $ctpBanner = get_post_meta($post->ID);
    $textPrincipal = isset($ctpBanner["texto_principal"][0])?$ctpBanner["texto_principal"][0]:'';
    $descricao = isset($ctpBanner["descricao"][0])?$ctpBanner["descricao"][0]:'';
    ?>
    <label>Texto principal:</label>
    <input name="texto_principal" value="<?php echo $textPrincipal; ?>">
    <br>
    <br>
    <label>Descrição:</label>
    <input name="descricao" value="<?php echo $descricao; ?>">
    <?php
}

function wporg_save_postdata($post_id)
{
    foreach ($_POST as $key => $value){
        if($key === 'texto_principal' || $key === 'descricao'){
            update_post_meta(
                $post_id,
                $key,
                $value
            );
        }
    }
}
add_action('save_post', 'wporg_save_postdata');

/*Registrando menu de navegação*/
function alura_intercambios_registrando_menu() {
    register_nav_menu(
            'menu-navegacao',
            __( 'Menu navegacao' )
    );
}
add_action( 'init', 'alura_intercambios_registrando_menu' );


/*Post customizado destinos*/
// Creating a Deals Custom Post Type
function crunchify_deals_custom_post_type() {
    $labels = array(
        'name'                => __( 'Destinos' ),
        'singular_name'       => __( 'Destino'),
        'menu_name'           => __( 'Destinos'),
        'parent_item_colon'   => __( 'Destino Principal'),
        'all_items'           => __( 'Todos os Destinos'),
        'view_item'           => __( 'Ver Destinos'),
        'add_new_item'        => __( 'Adicionar Novo Destino'),
        'add_new'             => __( 'Adicionar Novo'),
        'edit_item'           => __( 'Editar Destino'),
        'update_item'         => __( 'Atualizar Destino'),
        'search_items'        => __( 'Procurar Destino'),
        'not_found'           => __( 'Nada Encontrado'),
        'not_found_in_trash'  => __( 'Nada Encontrado na Lixeira')
    );
    $args = array(
        'label'               => __( 'destinos'),
        'description'         => __( 'Destinos de intercâmbio'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'taxonomies' 	      => array('post_tag'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'destinos', $args );
}
add_action( 'init', 'crunchify_deals_custom_post_type', 0 );

add_action( 'init', 'crunchify_create_deals_custom_taxonomy', 0 );

//create a custom taxonomy name it "type" for your posts
function crunchify_create_deals_custom_taxonomy() {

    $labels = array(
        'name' => _x( 'Países', 'taxonomy general name' ),
        'singular_name' => _x( 'País', 'taxonomy singular name' ),
        'search_items' =>  __( 'Procurar Países' ),
        'all_items' => __( 'Todos os países' ),
        'edit_item' => __( 'Edit País' ),
        'update_item' => __( 'Atualizar País' ),
        'add_new_item' => __( 'Adicionar Novo País' ),
        'new_item_name' => __( 'Novo País' ),
        'menu_name' => __( 'Países' ),
    );

    register_taxonomy('paises',array('destinos'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'destinos' ),
    ));
}