<?php
function receitas_post_type() {
	$labels = array(
		'name'                => _x( 'Receitas', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Receita', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Receitas', 'fvw' ),
		'name_admin_bar'      => __( 'Receitas', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Receita:', 'fvw' ),
		'all_items'           => __( 'Todas Receitas', 'fvw' ),
		'add_new_item'        => __( 'Novo Receita', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Receita', 'fvw' ),
		'edit_item'           => __( 'Editar Receita', 'fvw' ),
		'update_item'         => __( 'Atualizar Receita', 'fvw' ),
		'view_item'           => __( 'Visualizar Receita', 'fvw' ),
		'search_items'        => __( 'Buscar Receita', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Receita', 'fvw' ),
		'description'         => __( 'Receitas', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title','thumbnail', 'excerpt'),
		'taxonomies'          => array( 'category_receitas' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-carrot',
		'menu_position'       => 6,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'receitas', $args );
}
// Hook into the 'init' action
add_action( 'init', 'receitas_post_type', 0 );