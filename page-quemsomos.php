<?php
/**
 * Template Name: Quem somos
 */

get_header(); ?>
<div id="quemsomos">
	<section id="banner">
		<?php
			$thumb = get_the_post_thumbnail_url( $post->ID );
		?>
		<img src="<?php echo $thumb ?>" />
	</section>
	<section id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container-fluid">
			<div class="row">
				<div id="personagem1" class="col-4 personagens">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/comofunciona_personagens_01.png" />
				</div>
				<div id="content" class="col-4">
					<span class="icon">	</span>
					<h3><?php the_title(); ?></h3>
					<?php the_content();?>
				</div>
				<div id="personagem2" class="col-4 personagens">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/comofunciona_personagens_02.png" />
				</div>
			</div>
		</div>
	<?php endwhile; // end of the loop. ?>
	</section>
</div>
<?php get_footer(); ?>