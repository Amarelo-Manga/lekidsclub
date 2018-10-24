<?php
/**
 * Template Name: Torne-se Parceiro
 */

get_header(); ?>

<div id="parceiro" class="archives">
	<header>
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
			<h3>Torne-se Parceiro<br /><span>Descrição dos Parceiro</span></h3>
		</div>
	</header>
	<div class="container-fluid">
		<section class="row">
			<article class="col-md-8 col-lg-8">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row">
					<?php the_content(); ?>
				</div>
			<?php endwhile; // end of the loop. ?>
			</article>
		</section>
	</div>
</div>
<?php get_footer(); ?>