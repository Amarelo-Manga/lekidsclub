<?php

/**
 * PostType Crianças
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/post-type-criancas.php')) {
    require_once( dirname(__FILE__).'/post-type-criancas.php' );
}

/**
 * PostType Crianças
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/taxonomy-estado.php')) {
    require_once( dirname(__FILE__).'/taxonomy-estado.php' );
}

/**
 * Shortcode Cadastro Login
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/shortcode-login.php')) {
    require_once( dirname(__FILE__).'/shortcode-login.php' );
}


add_action('wp_enqueue_scripts', function() {
	wp_localize_script('mainjs','vars', array( 
											'ajaxurl'=>admin_url( 'admin-ajax.php' ), 
											'pagecadastro'=>get_permalink(17) 
										) );
},100);

/**
 * Valida Email
 */
add_action("wp_ajax_validaEmail", "valida_email");
add_action("wp_ajax_nopriv_validaEmail", "valida_email");
require __DIR__ . '/ajax/valida-email.php';

/**
 * Add User Ajax
 */
add_action("wp_ajax_addUser", "adicionar_user");
add_action("wp_ajax_nopriv_addUser", "adicionar_user");
require __DIR__ . '/ajax/add-user.php';

/**
 * Add User Ajax
 */
add_action("wp_ajax_addCrianca", "adicionar_crianca");
add_action("wp_ajax_nopriv_addCrianca", "adicionar_crianca");
require __DIR__ . '/ajax/add-crianca.php';

/**
 * Editar cadastro Ajax
 */
add_action("wp_ajax_editCadastro", "editar_cadastro");
add_action("wp_ajax_nopriv_editCadastro", "editar_cadastro");
require __DIR__ . '/ajax/edit-cadastro.php';


// Remove Administrator role from roles list
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

//Redirect Page Faled Login
add_action( 'wp_login_failed', 'pippin_login_fail' );  
function pippin_login_fail( $username ) {
     $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
     // if there's a valid referrer, and it's not the default log-in screen
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_redirect(esc_url(get_permalink(924)));
          exit;
     }
}

add_action( 'pre_get_posts', 'wpsites_no_limit_posts' );
function wpsites_no_limit_posts( $query ) {
	if( $query->is_main_query() && !is_admin() && !is_home() ) {
		$query->set( 'posts_per_page', '-1' );
    }
}
