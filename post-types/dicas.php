<?php
function dicas_post_type() {
	$labels = array(
		'name'                => _x( 'Dicas', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Dica', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Dicas', 'fvw' ),
		'name_admin_bar'      => __( 'Dicas', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Dica:', 'fvw' ),
		'all_items'           => __( 'Todas Dicas', 'fvw' ),
		'add_new_item'        => __( 'Novo Dica', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Dica', 'fvw' ),
		'edit_item'           => __( 'Editar Dica', 'fvw' ),
		'update_item'         => __( 'Atualizar Dica', 'fvw' ),
		'view_item'           => __( 'Visualizar Dica', 'fvw' ),
		'search_items'        => __( 'Buscar Dica', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Dica', 'fvw' ),
		'description'         => __( 'Dicas', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'          => array( 'category_dicas' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-heart',
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'dicas', $args );
}
// Hook into the 'init' action
add_action( 'init', 'dicas_post_type', 0 );