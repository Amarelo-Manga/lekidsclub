<?php
/**
 *
 * Widgets
 *
 * @since  1.0.0
 *
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Social Top', 'neat' ),
		'id'            => 'social_top',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Cadastro Top', 'neat' ),
		'id'            => 'cadastro_top',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Logo LeClub', 'neat' ),
		'id'            => 'logo_leclub',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'widgets_init' );