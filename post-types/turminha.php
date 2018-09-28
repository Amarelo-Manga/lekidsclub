<?php
function turminha_post_type() {
	$labels = array(
		'name'                => _x( 'Turminha', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Turminha', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Turminha', 'fvw' ),
		'name_admin_bar'      => __( 'Turminha', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Turminha:', 'fvw' ),
		'all_items'           => __( 'Todos Personagens', 'fvw' ),
		'add_new_item'        => __( 'Novo Personagem', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Personagem', 'fvw' ),
		'edit_item'           => __( 'Editar Personagem', 'fvw' ),
		'update_item'         => __( 'Atualizar Personagem', 'fvw' ),
		'view_item'           => __( 'Visualizar Personagem', 'fvw' ),
		'search_items'        => __( 'Buscar Personagem', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Turminha', 'fvw' ),
		'description'         => __( 'Turminha', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-nametag',
		'menu_position'       => 7,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'turminha', $args );
}
// Hook into the 'init' action
add_action( 'init', 'turminha_post_type', 0 );