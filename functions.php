<?php

function custom_theme() {
    wp_enqueue_script('jquery', "https://code.jquery.com/jquery-3.6.0.min.js", array(), null);

    wp_enqueue_style('bootstrapcss', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css", array(), null);
    wp_enqueue_script('bootstrapbundlejs', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js", array(), null);

    wp_enqueue_style('fontawesomecss', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css", array(), null);
    wp_enqueue_script('fontawesomejs', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js", array(), null);

    wp_enqueue_style('tnscss', "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css", array(), null);
    wp_enqueue_script('tnsjs', "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", array(), null);

    wp_enqueue_style('style', get_stylesheet_uri(), array(), null);
    wp_enqueue_script('main', get_template_directory_uri() . '/main.js', array(), null);
}
add_action("wp_enqueue_scripts", "custom_theme");

function add_widget_Support() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'add_Widget_Support');

function add_Main_Nav() {
    register_nav_menu('header-menu', __('Header Menu'));
}
// Hook to the init action hook, run our navigation menu function
add_action('init', 'add_Main_Nav');

add_theme_support('custom-logo');
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array('site-title', 'site-description'),
));

add_theme_support('post-thumbnails');



add_action('init', 'register_banners');
function register_banners() {

    criarPostType('Banners', 'Banner', 5, 'dashicons-images-alt2', 'banners');

    criarTaxonomia('banner_categories', 'banners', 'Categorias', 'Categoria');

    criarCategoria('Banner Desktop', 'banner_categories', 'banner-desktop');
    criarCategoria('Banner Mobile', 'banner_categories', 'banner-mobile');

    criarPost("Banner Desk/Mobile", "banners", ["banner-desktop", "banner-mobile"], "banner_categories");
}


add_action('init', 'register_sobrenos');
function register_sobrenos() {

    criarPostType('Sobre Nós', 'Sobre Nós', 6, 'dashicons-media-text', 'sobrenos');

    criarTaxonomia('sobrenos_categories', 'sobrenos', 'Categorias', 'Categoria');
}

add_action('init', 'register_servicos');
function register_servicos() {

    criarPostType('Serviços', 'Serviço', 7, 'dashicons-hammer', 'servicos');

    criarTaxonomia('servicos_categories', 'servicos', 'Categorias', 'Categoria');
}

add_action('init', 'register_contatos');
function register_contatos() {

    criarPostType('Contatos', 'Contato', 8, 'dashicons-share', 'contatos');

    criarTaxonomia('contatos_categories', 'contatos', 'Categorias', 'Categoria');

    criarCategoria('Whatsapp', 'contatos_categories', 'whatsapp');
    criarCategoria('Telefone Fixo', 'contatos_categories', 'telefone_fixo');
    criarCategoria('Instagram', 'contatos_categories', 'instragram');
    criarCategoria('Facebook', 'contatos_categories', 'facebook');
    criarCategoria('Mapa', 'contatos_categories', 'mapa');
    criarCategoria('Endereço', 'contatos_categories', 'endereco');
    criarCategoria('Email', 'contatos_categories', 'email');
    criarCategoria('Horário Atendimento', 'contatos_categories', 'horario_atendimento');
    criarCategoria('Cookies', 'contatos_categories', 'cookies');

    criarPost("Whatsapp", "contatos", "whatsapp", "contatos_categories", "51999999999");
    criarPost("Telefone Fixo", "contatos", "telefone_fixo", "contatos_categories", "51999999999");
    criarPost("Facebook", "contatos", "facebook", "contatos_categories", "https://www.facebook.com/teste");
    criarPost("Instagram", "contatos", "instagram", "contatos_categories", "https://www.instagram.com/teste");
    criarPost("Mapa", "contatos", "mapa", "contatos_categories", "https://goo.gl/maps/RkYdaELqdHq4PDs18");
    criarPost("Endereço", "contatos", "endereco", "contatos_categories", "Rodovia, ERS-413, 3655 - Moinhos d'Água, Lajeado - RS, 95904-500");
    criarPost("Email", "contatos", "email", "contatos_categories", "teste@email.com");
    criarPost("Horário Atendimento", "contatos", "horario_atendimento", "contatos_categories", "Segunda a Sexta-feira das 8 as 18h.");
    criarPost("Cookies", "contatos", "cookies", "contatos_categories", "Este site utiliza cookies para melhorar sua experiência!");
}

function criarPostType($name, $singularName, $menuPosition, $menuIcon, $queryVar) {
    $labels = [
        'name' => _x($name, 'post type general name'),
        'singular_name' => _x($singularName, 'post type singular name'),
        'add_new' => 'Novo',
        'edit_item' => 'Editar',
    ];

    $supports = [
        'title',
        'editor',
        'thumbnail',
    ];

    $args = [
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'has_archive'       => false,
        'menu_position'     => $menuPosition,
        'menu_icon'         => $menuIcon,
        'hierarchical'      => false,
        'query_var'         => $queryVar,
        'supports'          => $supports
    ];

    register_post_type($queryVar, $args);
}

function criarTaxonomia($taxonomySlug, $postType, $label, $singularLabel) {
    register_taxonomy(
        $taxonomySlug,
        [$postType],
        [
            'hierarchical' => true,
            'label' => $label,
            'singular_label' => $singularLabel,
            'rewrite' => array('slug' => $taxonomySlug, 'with_front' => false)
        ]
    );

    register_taxonomy_for_object_type($taxonomySlug, $postType);
}

function criarCategoria($label, $taxonomySlug, $slugCategory) {
    wp_insert_term(
        $label,
        $taxonomySlug,
        ['slug' => $slugCategory]
    );
}

function criarPost($nomePost, $tipoPost, $slugCategory, $taxonomy, $content = '') {
    if (get_page_by_title($nomePost, 'OBJECT', $tipoPost) == NULL) {
        $whatsPost = array(
            'post_title' => $nomePost,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_date' => getDatetimeNow(),
            'post_type' => $tipoPost,
        );
        $post_id = wp_insert_post($whatsPost);
        wp_set_object_terms($post_id, $slugCategory, $taxonomy);
    }
}

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Brazil/East');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}
