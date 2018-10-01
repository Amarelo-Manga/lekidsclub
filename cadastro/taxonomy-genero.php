<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'genero_taxonomies', 0 );

function genero_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Gênero', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Gênero', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Buscar Gênero', 'textdomain' ),
		'all_items'         => __( 'Todos Gênero', 'textdomain' ),
		'parent_item'       => __( 'Parent Gênero', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Gênero:', 'textdomain' ),
		'edit_item'         => __( 'Editar Gêneros', 'textdomain' ),
		'update_item'       => __( 'Atualizar Gêneros', 'textdomain' ),
		'add_new_item'      => __( 'Add Novo Gêneros', 'textdomain' ),
		'new_item_name'     => __( 'Novo Gêneros Nome', 'textdomain' ),
		'menu_name'         => __( 'Gênero', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genero' ),
		'show_in_nav_menus' => false,
	);

	register_taxonomy( 'genero_crianca', array( 'criancas' ), $args );
}