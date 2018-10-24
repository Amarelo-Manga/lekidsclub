<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>
<article id="oferta">
<?php while ( have_posts() ) : the_post(); ?>
	<?php 
		$preco_pessoa_titulo = get_field( 'preco_pessoa_titulo', $post->ID );
		$preco = get_field( 'preco', $post->ID );
		$preco_infos = get_field( 'preco_infos', $post->ID );
		$tempo_utilizacao_titulo = get_field( 'tempo_utilizacao_titulo', $post->ID );
		$tempo = get_field( 'tempo', $post->ID ); 
		$tempo_infos = get_field( 'tempo_infos', $post->ID ); 
		$desconto_titulo = get_field( 'desconto_titulo', $post->ID );
		$desconto = get_field( 'desconto', $post->ID ); 
		$desconto_infos = get_field( 'desconto_infos', $post->ID ); 
		$thumb = get_the_post_thumbnail_url( $post->ID );
		$logoHotel	= get_field( 'logo_hotel', $post->ID );
		$hotel 		= get_field( 'nome_hotel', $post->ID );
		$promocao	= get_field( 'nome_oferta', $post->ID );
	?>
	<header id="breadcrumbs">
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
		</div>
	</header>
	<div id="banner">
		<img src="<?php echo $thumb; ?>" />
	</div>
	<div id="hotel">
		<div class="container-fluid">
			<span id="logo">
				<img src="<?php echo $logoHotel; ?>" />
			</span>
			<span id="content">
				<h4><?php echo $hotel; ?></h4>
				<h5><?php echo $promocao; ?></h5>
			</span>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-5 content">
				<h3><?php the_title();?></h3>
				<?php the_content();?>
			</div>
			<div class="col-7">
				<div class="row">
					<div id="preco" class="col-3 box">
						<h4><?php echo $preco_pessoa_titulo; ?></h4>
						<strong><?php echo $preco; ?></strong>
						<p><?php echo $preco_infos; ?></p>
					</div>
					<div id="tempo" class="col-3 box">
						<h4><?php echo $tempo_utilizacao_titulo; ?></h4>
						<strong><?php echo $tempo; ?></strong>
						<p><?php echo $tempo_infos; ?></p>
					</div>
					<div id="desconto" class="col-4 box">
						<h4><?php echo $desconto_titulo; ?></h4>
						<strong><?php echo $desconto; ?></strong>
						<p><?php echo $desconto_infos; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>
</article>
<section id="ofertas" class="archives single-lista">
	<div class="container-fluid">
		<h3>Mais Ofertas</h3>
		<div class="row">
			<?php 
				$args = array(
					'posts_per_page'   => 4,
					'post_type'        => 'ofertas',
					'post_status'      => 'publish',
					'exclude'		   => $post->ID
				);
				$ofertas = get_posts( $args );
				foreach ( $ofertas as $post ) {
					$title 		= get_field( 'titulo_thumb', $post->ID );
					$thumb 		= get_field( 'thumb', $post->ID );
					$url 		= get_permalink( $post->ID );
					$logoHotel	= get_field( 'logo_hotel_thumb', $post->ID );
					$classe 	= "";
					$hotel 		= get_field( 'nome_hotel', $post->ID );
					$promocao	= get_field( 'nome_oferta', $post->ID );
					if( !empty($logoHotel) ){
						$classe = "titulo";
					}
			?>
				<article class="col-md-6 col-lg-4" style="background:url(<?php echo $logoHotel; ?>);">
					<h4 class="content_azul"><span class="<?php echo $classe; ?>"><?php echo $promocao; ?><br /><?php echo $hotel; ?></span><span class="img"><img src="<?php echo $logoHotel; ?>"></span></h4>
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
