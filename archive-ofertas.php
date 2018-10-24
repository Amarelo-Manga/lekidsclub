<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Neat
 */

get_header(); ?>

<div id="ofertas" class="archives">
	<header>
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
			<h3>Ofertas<br /><span>Descrição das Ofertas</span></h3>
		</div>
	</header>
	<div class="container-fluid">
		<section class="row">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/content', 'archive_ofertas' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>
