<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div id="subHeader" >
			<div class="container-fluid">
				<div class="row d-flex flex-row-reverse">
					<div id="cadastro" class="col-3 col-md-3 col-lg-3">
						<?php 
							if ( is_active_sidebar( 'cadastro_top' ) ) {
								dynamic_sidebar( 'cadastro_top' );
							};
						?>
					</div>
					<div id="social" class="col-2 col-md-2 col-lg-2">
						<?php 
							if ( is_active_sidebar( 'social_top' ) ) {
								dynamic_sidebar( 'social_top' );
							};
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="header">
			<div class="container-fluid">
			<div class="row">
				<div id="logo" class="col-12 col-md-2 col-lg-2">
					<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						if ( has_custom_logo() ) {
						        echo '<h2><a href="'.site_url().'" ><img src="'. esc_url( $logo[0] ) .'" title="Accor Hotels" alt="Accor Hotels"></a></h2>';
						} else {
						        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
						}
					?>
				</div>
				<div class="col-8 col-md-8 col-lg-8 menu">
					<nav class="navbar navbar-expand-lg navbar-light">
						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    	<span class="navbar-toggler-icon"></span>
					 	 </button>
						<div class="collapse navbar-collapse" aria-expanded="false" id="navbarNav">
							<?php
							    echo str_replace( 'class="menu-item', 'class="nav-item menu-item',
							        wp_nav_menu(
							            array(
							                'theme_location'    => 'primary',
							                'menu_id' 			=> 'primary-menu',
							                'container'         => false,
							                'items_wrap'        => '<ul class="navbar-nav mr-auto">%3$s</ul>',
							                'depth'             => 1,
							                'echo'              => false
							            )
							        )
							    );
							?>
						</div>
					</nav>
				</div>
				<div id="logo_leclub" class="col-12 col-md-2 col-lg-2">
					<?php 
						if ( is_active_sidebar( 'logo_leclub' ) ) {
							dynamic_sidebar( 'logo_leclub' );
						};
					?>
				</div>
			</div><!-- Row -->
			</div>
		</div><!-- Contanier-->
	</header>