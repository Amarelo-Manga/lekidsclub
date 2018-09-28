<?php
function eventos_post_type() {
	$labels = array(
		'name'                => _x( 'Eventos', 'Post Type General Name', 'fvw' ),
		'singular_name'       => _x( 'Evento', 'Post Type Singular Name', 'fvw' ),
		'menu_name'           => __( 'Eventos', 'fvw' ),
		'name_admin_bar'      => __( 'Eventos', 'fvw' ),
		'parent_item_colon'   => __( 'Parent Evento:', 'fvw' ),
		'all_items'           => __( 'Todas Eventos', 'fvw' ),
		'add_new_item'        => __( 'Novo Evento', 'fvw' ),
		'add_new'             => __( 'Add novo', 'fvw' ),
		'new_item'            => __( 'Novo Evento', 'fvw' ),
		'edit_item'           => __( 'Editar Evento', 'fvw' ),
		'update_item'         => __( 'Atualizar Evento', 'fvw' ),
		'view_item'           => __( 'Visualizar Evento', 'fvw' ),
		'search_items'        => __( 'Buscar Evento', 'fvw' ),
		'not_found'           => __( 'Not found', 'fvw' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'fvw' ),
	);
	$args = array(
		'label'               => __( 'Evento', 'fvw' ),
		'description'         => __( 'Eventos', 'fvw' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'          => array( 'category_eventos' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'			  => 'dashicons-calendar-alt',
		'menu_position'       => 4,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'eventos', $args );
}
// Hook into the 'init' action
add_action( 'init', 'eventos_post_type', 0 );