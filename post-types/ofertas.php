<?php
function ofertas_post_type() {
	$labels = array(
		'name'                => _x( 'Ofertas', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Oferta', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Ofertas', 'fvw' ),
		'name_admin_bar'      => __( 'Ofertas', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Oferta:', 'fvw' ),
		'all_items'           => __( 'Todas Ofertas', 'fvw' ),
		'add_new_item'        => __( 'Novo Oferta', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Oferta', 'fvw' ),
		'edit_item'           => __( 'Editar Oferta', 'fvw' ),
		'update_item'         => __( 'Atualizar Oferta', 'fvw' ),
		'view_item'           => __( 'Visualizar Oferta', 'fvw' ),
		'search_items'        => __( 'Buscar Oferta', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Oferta', 'fvw' ),
		'description'         => __( 'Ofertas', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'          => array( 'category_ofertas' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-tag',
		'menu_position'       => 3,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'ofertas', $args );
}
// Hook into the 'init' action
add_action( 'init', 'ofertas_post_type', 0 );