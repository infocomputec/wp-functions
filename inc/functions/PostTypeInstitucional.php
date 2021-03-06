<?php 
function institucionalTax() {
    $label = array(
        'name' => 'Institucional (Categoria)',
        'singular_name' => 'Categoria',
        'menu_name' => 'Categorias',
        'all_items' => 'Todas as Tipos',
        'edit_item' => 'Editar Categoria',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Categoria Pai',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'institucionalcat',
        'institucional',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'institucionais'),
        )
    );
}
add_action('init',  'institucionalTax');

function patologistasEstado() {
    $label = array(
        'name' => 'Patologistas - Estado',
        'singular_name' => 'Estado',
        'menu_name' => 'Estados (Patologistas)',
        'all_items' => 'Todos os Estados',
        'edit_item' => 'Editar Estado',
        'view_item' => 'Visualizar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar Nova',
        'new_item_name' => 'Novo Item',
        'parent_item' => 'Estado',
        'parent_item_colon' => '',
        'search_items' => '',
        'popular_items' => '',
        'separate_items_with_commas' => '',
        'add_or_remove_items' => '',
        'choose_from_most_used' => '',
        'not_found' => ''
    );
    register_taxonomy(
        'patologistas-estado',
        'institucional',
        array(
            'labels' => $label,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'institucional/patologistas-clinicos/estado')
        )
    );
}
add_action('init',  'patologistasEstado');

function postTypeInstitucional() {
    $labels = array(
        'name'               => _x( 'Institucional', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Institucional', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Institucional', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Institucional', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Adicional Novo', 'Institucional', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Adicional Novo Institucional', 'your-plugin-textdomain' ),
        'new_item'           => __( 'Novo Institucional', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Editar Institucional', 'your-plugin-textdomain' ),
        'view_item'          => __( 'Visualizar Institucional', 'your-plugin-textdomain' ),
        'all_items'          => __( 'Todos', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Pesquisar Institucional', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Institucional Pai:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'Nenhum Institucional encontrado.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'Nenhum Institucional encontrado in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Descrição', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'institucional'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'with_front'         => false,
        'menu_position'      => 28,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'         => array('institucionalcat', 'patologistas-estado')
    );
    register_post_type('institucional', $args);
    add_post_type_support( 'institucional', 'wps_subtitle' );
}
add_action('init', 'postTypeInstitucional');

