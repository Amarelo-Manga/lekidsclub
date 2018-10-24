<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>
<article id="receita">
<?php while ( have_posts() ) : the_post(); ?>
	<?php 
		$ingredientes = get_field( 'ingredientes', $post->ID );
		$modo_preparo = get_field( 'modo_preparo', $post->ID );
		$tempo_preparo_titulo = get_field( 'tempo_preparo_titulo', $post->ID );
		$tempo = get_field( 'tempo', $post->ID );
		$rendimento_titulo = get_field( 'rendimento_titulo', $post->ID ); 
		$rendimento = get_field( 'rendimento', $post->ID ); 
		$thumb = get_the_post_thumbnail_url( $post->ID );
	?>
	<header id="breadcrumbs">
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
		</div>
	</header>
	<div id="banner">
		<img src="<?php echo $thumb; ?>" />
	</div>
	<div class="container-fluid">
		<h3><?php the_title(); ?></h3>
		<div class="row">
			<div class="col-3">
				<div id="tempo" class="box">
					<i class="fas fa-clock"></i>
					<span><?php echo $tempo_preparo_titulo; ?></span>
					<strong><?php echo $tempo; ?></strong>
				</div>
				<div id="rendimento" class="box">
					<i class="fas fa-utensils"></i>
					<span><?php echo $rendimento_titulo; ?></span>
					<strong><?php echo $rendimento; ?></strong>
				</div>
			</div>
			<div class="col-3">
				<h4>Ingredientes</h4>
				<?php echo $ingredientes; ?>
			</div>
			<div class="col-6">
				<h4>Modo de Preparo</h4>
				<?php echo $modo_preparo; ?>
			</div>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>
</article>
<section id="Receitas" class="archives single-lista">
	<div class="container-fluid">
		<h3>Mais Receitas</h3>
		<div class="row">
			<?php 
				$args = array(
					'posts_per_page'   => 4,
					'post_type'        => 'receitas',
					'post_status'      => 'publish',
					'exclude'		   => $post->ID
				);
				$receitas = get_posts( $args );
				foreach ( $receitas as $post ) {
					$title 		= get_field( 'titulo_thumb', $post->ID );
					$thumb 		= get_field( 'thumb', $post->ID );
					$url 		= get_permalink( $post->ID );
					$logoHotel	= get_field( 'logo_hotel', $post->ID );
					$classe 	= "";
					if( !empty($logoHotel) ){
						$classe = "titulo";
					}
			?>
				<article class="col-md-6 col-lg-4" style="background:url(<?php echo $logoHotel; ?>);">
					<h4 class="content_azul"><span class="<?php echo $classe; ?>"><?php the_title( ); ?></span><span class="img"><img src="<?php echo $logoHotel; ?>"></span></h4>
					<img src="<?php echo $thumb; ?>" />
					<a href="<?php echo get_permalink(); ?>" class="btn_rosa">Ver detalhes</a>
				</article>
			<?php
				}
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
