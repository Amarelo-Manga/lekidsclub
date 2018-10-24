<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'estado_taxonomies', 0 );

function estado_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Estado', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Estado', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Estado', 'textdomain' ),
		'all_items'         => __( 'Todos Estado', 'textdomain' ),
		'parent_item'       => __( 'Parent Estado', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Estado:', 'textdomain' ),
		'edit_item'         => __( 'Editar Estados', 'textdomain' ),
		'update_item'       => __( 'Atualizar Estados', 'textdomain' ),
		'add_new_item'      => __( 'Add Novo Estados', 'textdomain' ),
		'new_item_name'     => __( 'Novo Estados Nome', 'textdomain' ),
		'menu_name'         => __( 'Estado', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'estado' ),
		'show_in_nav_menus' => false,
	);

	register_taxonomy( 'estado', array( 'criancas' ), $args );
}