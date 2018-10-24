<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>

	<div class="aa_single">
validade_titulo
validade
validade_infos

utilizacao_titulo
utilizacao
utilizacao_infos

desconto_titulo
desconto
desconto_titulo


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>


	</div>
	<!-- /.aa_single -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
