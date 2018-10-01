<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'category_dicas_taxonomies', 1 );

function category_dicas_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categorias', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Categorias', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Categorias', 'textdomain' ),
		'all_items'         => __( 'Todos Categorias', 'textdomain' ),
		'parent_item'       => __( 'Parent Categorias', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Categorias:', 'textdomain' ),
		'edit_item'         => __( 'Editar Categoriass', 'textdomain' ),
		'update_item'       => __( 'Atualizar Categoriass', 'textdomain' ),
		'add_new_item'      => __( 'Add Novo Categoriass', 'textdomain' ),
		'new_item_name'     => __( 'Novo Categoriass Nome', 'textdomain' ),
		'menu_name'         => __( 'Categorias', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category_dicas' ),
		'show_in_nav_menus' => false,
	);

	register_taxonomy( 'category_dicas', array( 'dicas' ), $args );
}