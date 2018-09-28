<?php
function parcerias_post_type() {
	$labels = array(
		'name'                => _x( 'Parcerias', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Parceria', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Parcerias', 'fvw' ),
		'name_admin_bar'      => __( 'Parcerias', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Parceria:', 'fvw' ),
		'all_items'           => __( 'Todas Parcerias', 'fvw' ),
		'add_new_item'        => __( 'Novo Parceria', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Parceria', 'fvw' ),
		'edit_item'           => __( 'Editar Parceria', 'fvw' ),
		'update_item'         => __( 'Atualizar Parceria', 'fvw' ),
		'view_item'           => __( 'Visualizar Parceria', 'fvw' ),
		'search_items'        => __( 'Buscar Parceria', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Parceria', 'fvw' ),
		'description'         => __( 'Parcerias', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'          => array( 'category_parcerias' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-groups',
		'menu_position'       => 7,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'parcerias', $args );
}
// Hook into the 'init' action
add_action( 'init', 'parcerias_post_type', 0 );