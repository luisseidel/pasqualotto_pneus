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

    //criarPost("Banner Desk/Mobile", "banners", ["banner-desktop", "banner-mobile"], "banner_categories");

    criarPost("Banner Desk 1", "banners", "banner-desktop", "banner_categories");
    criarPost("Banner Desk 2", "banners", "banner-desktop", "banner_categories");

    criarPost("Banner Mobile 1", "banners", "banner-mobile", "banner_categories");
    criarPost("Banner Mobile 2", "banners", "banner-mobile", "banner_categories");
}


add_action('init', 'register_sobrenos');
function register_sobrenos() {

    criarPostType('Sobre N??s', 'Sobre N??s', 6, 'dashicons-media-text', 'sobrenos');
    criarTaxonomia('sobrenos_categories', 'sobrenos', 'Categorias', 'Categoria');
    criarPost("Sobre N??s", "sobrenos", "sobrenos", "sobrenos_categories", "A Pasqualotto Pneus foi fundada em 1966, no cora????o do bairro Boqueir??o, em Passo Fundo/RS, pela fam??lia Pasqualotto. A empresa busca constantemente, a moderniza????o dos seus m??todos, um ambiente acolhedor para a equipe e excel??ncia no atendimento ao cliente. Em 2021, a empresa estabeleceu uma nova configura????o societ??ria e modernizou sua infraestrutura, incluindo servi??os de Auto Center. Quando se trabalha com a equipe da Pasqualotto Pneus, o seu carro estar?? sendo cuidado por pessoas com anos de casa, apaixonadas pelo que fazem. Uma equipe que n??o muda e que cuida do seu carro como se ele fosse ??nico. Capacidade t??cnica, comprometimento e uni??o, ?? o que nos define!");
}

add_action('init', 'register_pneus');
function register_pneus() {

    criarPostType('Pneus', 'Pneu', 7, 'dashicons-admin-generic', 'pneus');
    criarTaxonomia('pneus_categories', 'pneus', 'Categorias', 'Categoria');

    criarPost("Dunlop", "pneus", "pneus", "pneus_categories", "");
    criarPost("Delinte", "pneus", "pneus", "pneus_categories", "");
    criarPost("Yokohama", "pneus", "pneus", "pneus_categories", "");
    criarPost("Maxxis", "pneus", "pneus", "pneus_categories", "");
    criarPost("Minerva", "pneus", "pneus", "pneus_categories", "");
    criarPost("Falken", "pneus", "pneus", "pneus_categories", "");
}

add_action('init', 'register_servicos');
function register_servicos() {

    criarPostType('Servi??os', 'Servi??o', 8, 'dashicons-hammer', 'servicos');
    criarTaxonomia('servicos_categories', 'servicos', 'Categorias', 'Categoria');

    criarPost("Vulcaniza????o", "servicos", "servicos", "servicos_categories", "A vulcaniza????o ?? utilizada como forma de dar um reaproveitamento em pneus, que de certa forma, sofreram algum dano na sua estrutura original. Ela faz com que eles tenham uma ???vida ??til??? mais prolongada, devido a maneira com a vulcaniza????o ?? realizada. De todos os processos de repara????o de danos em pneus, a vulcaniza????o ?? maneira mais segura e confi??vel.");
    criarPost("Geometria 3D", "servicos", "servicos", "servicos_categories", "Tecnologia de ??ltima gera????o, recomendado pelos principais fabricantes mundiais de Autom??veis e Pneus. Garantimos o ajuste de acordo com os par??metros do fabricante do ve??culo.");
    criarPost("Balanceamento", "servicos", "servicos", "servicos_categories", "O balanceamento ?? um procedimento que equilibra o conjunto roda/pneu/v??lvula ou c??mara do ve??culo por meio de contrapesos de chumbo. A sua fun????o ?? melhorar a estabilidade do ve??culo e consequentemente, a dirigibilidade.");
    criarPost("Suspens??o", "servicos", "servicos", "servicos_categories", "A suspens??o ?? o sistema de molas, amortecedores e bra??os utilizados para reduzir o impacto da irregularidade da pista aos ocupantes do ve??culo. A suspens??o tamb??m ?? respons??vel pela estabilidade do ve??culo.");
    criarPost("Freios", "servicos", "servicos", "servicos_categories", "Os freios de um autom??vel n??o possuem a fun????o de parar o mesmo, na verdade, a fun????o dos freios ?? reduzir a velocidade da roda at?? a imobiliza????o daquele. Para realizar tal fun????o, o sistema de freio automotivo se utiliza de importantes conceitos f??sicos, mas que n??o o fazem complexo ou complicado de compreender, manter e executar reparos.");
    criarPost("Troca de ??leo e Filtros", "servicos", "servicos", "servicos_categories", "A troca de ??leo consiste na substitui????o de lubrificantes e de filtros. Trabalhamos com os melhores lubrificantes e observamos a manuten????o recomendada conforme o manual do propriet??rio do ve??culo.");
}

add_action('init', 'register_contatos');
function register_contatos() {

    criarPostType('Contatos', 'Contato', 9, 'dashicons-share', 'contatos');
    criarTaxonomia('contatos_categories', 'contatos', 'Categorias', 'Categoria');

    criarCategoria('Whatsapp', 'contatos_categories', 'whatsapp');
    criarCategoria('Telefone Fixo', 'contatos_categories', 'telefone_fixo');
    criarCategoria('Instagram', 'contatos_categories', 'instragram');
    criarCategoria('Facebook', 'contatos_categories', 'facebook');
    criarCategoria('Mapa Link', 'contatos_categories', 'mapa_link');
    criarCategoria('Mapa Iframe', 'contatos_categories', 'mapa_iframe');
    criarCategoria('Endere??o', 'contatos_categories', 'endereco');
    //criarCategoria('Email', 'contatos_categories', 'email');
    //criarCategoria('Hor??rio Atendimento', 'contatos_categories', 'horario_atendimento');
    criarCategoria('Cookies', 'contatos_categories', 'cookies');

    criarPost("Whatsapp", "contatos", "whatsapp", "contatos_categories", "54999073823");
    criarPost("Telefone Fixo", "contatos", "telefone_fixo", "contatos_categories", "5433141061");
    criarPost("Facebook", "contatos", "facebook", "contatos_categories", "https://www.facebook.com/pasqualottocarcenter");
    criarPost("Instagram", "contatos", "instagram", "contatos_categories", "https://www.instagram.com/pasqualottocarcenter");
    criarPost("Mapa Link", "contatos", "mapa_link", "contatos_categories", "https://goo.gl/maps/qmp5atEpZCmaeuTN9");
    criarPost("Mapa Iframe", "contatos", "mapa_iframe", "contatos_categories", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3513.97537657027!2d-52.42799098544859!3d-28.268763457922066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e2bf5fcb597073%3A0x9c1b9e9064320994!2sPasqualotto%20Pneus%20Car%20Center!5e0!3m2!1spt-BR!2sbr!4v1649888354347!5m2!1spt-BR!2sbr");
    criarPost("Endere??o", "contatos", "endereco", "contatos_categories", "Rua Livramento, 35, Boqueir??o - Passo Fundo - RS");
    //criarPost("Email", "contatos", "email", "contatos_categories", "teste@email.com");
    //criarPost("Hor??rio Atendimento", "contatos", "horario_atendimento", "contatos_categories", "Segunda a Sexta-feira das 8 as 18h.");
    criarPost("Cookies", "contatos", "cookies", "contatos_categories", "Este site utiliza cookies para melhorar sua experi??ncia!");
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
