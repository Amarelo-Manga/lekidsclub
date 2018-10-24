<?php
/**
 * Template Name: Page Jogos
 */

get_header(); ?>

<div id="jogos" class="archives">
	<header>
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
			<h3>Jogos<br /><span>Descrição dos Jogos</span></h3>
		</div>
	</header>
	<div class="container-fluid">
		<section class="row">
			<?php
				// check if the repeater field has rows of data
				if( have_rows('jogos') ):
				    while ( have_rows('jogos') ) : the_row();
						$titulo = get_sub_field('titulo');
						$thumb = get_sub_field('thumb');
						$descricao = get_sub_field('descricao');
						$texto_link = get_sub_field('texto_link');
						$link = get_sub_field('link');
					?>
					<article class="col-md-6 col-lg-6">
						<h4 class="content_azul"><span class="<?php echo $classe; ?>"><?php echo $titulo; ?></span></h4>
						<img src="<?php echo $thumb; ?>" />
						<span><?php echo $descricao; ?></span>
						<a href="<?php echo $link; ?>" class="btn_rosa"><span><?php echo $descricao; ?></span><br /><?php echo $texto_link; ?></a>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>