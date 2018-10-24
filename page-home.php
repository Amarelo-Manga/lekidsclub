<?php
/**
 * Template Name: Home
 */

get_header(); ?>
<div id="home">
	<section id="banner">
		<?php
			$banner = get_field( 'banner', $post->ID);
		  	echo do_shortcode($banner);
		?>
	</section>
	<section id="ofertas">
		<div class="container-fluid">
			<h3>Ofertas <span>Le Kids</span></h3>
			<div class="row">
				<?php 
					$args = array(
						'posts_per_page'   => 4,
						'post_type'        => 'ofertas',
						'post_status'      => 'publish',
					);
					$ofertas = get_posts( $args );
					foreach ( $ofertas as $post ) {
						$hotel 		= get_field( 'nome_hotel', $post->ID );
						$promocao	= get_field( 'nome_oferta', $post->ID );
						$thumb 		= get_field( 'thumb', $post->ID );
						$url 		= get_permalink( $post->ID );
						$logoHotel	= get_field( 'logo_hotel_thumb', $post->ID );
						$classe 	= "";
						if( !empty($logoHotel) ){
							$classe = "titulo";
						}
				?>
					<article class="col-3" style="background:url(<?php echo $logoHotel; ?>);">
						<h4 class="content_azul"><span class="<?php echo $classe; ?>"><?php echo $promocao; ?><br /><?php echo $hotel; ?></span><span class="img"><img src="<?php echo $logoHotel; ?>"></span></h4>
						<img src="<?php echo $thumb; ?>" />
						<a href="<?php echo $url; ?>" class="btn_rosa">Ver detalhes</a>
					</article>
				<?php
					}
				?>
			</div>
			<div class="row">
				<a href="<?php echo get_post_type_archive_link( 'ofertas' ); ?>" class="btn_verde">Ver todas</a>
			</div>
		</div>
	</section>
	<section id="dicas">
		<div class="container-fluid">
			<div class="row">
				<div id="milu" class="col-4">
					<h3>Dicas da <span>Turminha</span></h3>
					<a href="<?php echo get_post_type_archive_link( 'dicas' ); ?>" class="btn_verde">Ver todas</a>
				</div>
				<?php 
					$args = array(
						'posts_per_page'   => 2,
						'post_type'        => 'dicas',
						'post_status'      => 'publish',
					);
					$dicas = get_posts( $args );
					foreach ( $dicas as $post ) {
						$title 		= get_field( 'titulo_thumb', $post->ID );
						$thumb 		= get_field( 'thumb', $post->ID );
						$url 		= get_permalink( $post->ID );
						$classe 	= "";
						if( !empty($logoHotel) ){
							$classe = "titulo";
						}
				?>
					<article class="col-4">
						<h4 class="content_azul"><span><?php echo $title; ?></span></h4>
						<img src="<?php echo $thumb; ?>" />
						<a href="<?php echo $url; ?>" class="btn_rosa">Ver detalhes</a>
					</article>
				<?php
					}
				?>
			</div>
		</div>
	</section>
	<div id="receita_jogos" class="container-fluid">
		<div class="row">
			<section id="receitas" class="col-6">
				<div class="content">
					<h3>Receitas</span></h3>
					<a href="<?php echo get_post_type_archive_link( 'receitas' ); ?>" class="btn_verde">ver 	todas</a>
				</div>
			</section>
			<section id="jogos" class="col-6">
				<div class="content">
					<h3>Jogos e <span>Diversão</span></h3>
					<a href="<?php echo get_permalink( 107 ); ?>" class="btn_verde">ver todas</a>
				</div>
			</section>
		</div>
	</div>
</div>
<?php get_footer(); ?>