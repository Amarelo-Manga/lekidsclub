<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>
<article id="evento">
<?php while ( have_posts() ) : the_post(); ?>
	<?php 
		$thumb = get_the_post_thumbnail_url( $post->ID );
		$texto_botao = get_field( 'texto_botao', $post->ID );
		$url = get_field( 'url', $post->ID );
		$call_action_google = get_field( 'call-action-google', $post->ID );
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
		<div class="row">
			<div class="col-12">
				<h3><?php the_title();?></h3>
				<?php the_content();?>
			</div>
		</div>
	</div>
<?php endwhile; // end of the loop. ?>
</article>
<!--Modal Galleria-->
<div class="modal" id="modal-gallery" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">×</button>
          <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body">
          <div id="modal-carousel" class="carousel">
   
            <div class="carousel-inner"> 
            	<img src="" id="imgModal" />          
            </div>
            
            <a class="carousel-control left" href="#modal-carousel" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <a class="carousel-control right" href="#modal-carousel" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
		    </div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--Modal Galleria-->
<section id="eventos" class="archives single-lista">
	<div class="container-fluid">
		<h3>Mais Eventos</h3>
		<div class="row">
			<?php 
				$args = array(
					'posts_per_page'   => 4,
					'post_type'        => 'eventos',
					'post_status'      => 'publish',
					'exclude'		   => $post->ID
				);
				$dicas = get_posts( $args );
				foreach ( $dicas as $post ) {
					$title 		= $post->post_title;
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