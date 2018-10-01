<?php
function criancas_post_type() {
	$labels = array(
		'name'                => _x( 'Crianças', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Criança', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Crianças', 'fvw' ),
		'name_admin_bar'      => __( 'Crianças', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Criança:', 'fvw' ),
		'all_items'           => __( 'Todas Crianças', 'fvw' ),
		'add_new_item'        => __( 'Novo Criança', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Criança', 'fvw' ),
		'edit_item'           => __( 'Editar Criança', 'fvw' ),
		'update_item'         => __( 'Atualizar Criança', 'fvw' ),
		'view_item'           => __( 'Visualizar Criança', 'fvw' ),
		'search_items'        => __( 'Buscar Criança', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Criança', 'fvw' ),
		'description'         => __( 'Crianças', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'genero_crianca' ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-smiley',
		'menu_position'       => 11,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'criancas', $args );
}
// Hook into the 'init' action
add_action( 'init', 'criancas_post_type', 0 );