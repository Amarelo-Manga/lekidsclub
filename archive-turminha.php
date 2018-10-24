<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Neat
 */

get_header(); ?>

<div id="turminha" class="archives">
	<header>
		<div class="container-fluid">
			<?php wp_custom_breadcrumbs(); ?>
			<h3>Turminha</h3>
		</div>
	</header>
	<div class="container-fluid">
		<section class="row">
			<div id="escolha" class="col-md-3 col-lg-3">
				<ul>
				<?php if ( have_posts() ) : ?>
					<?php 
						$count = 1;
						while ( have_posts() ) : the_post();
						$slug = $post->post_name;
						$icon			= get_field( 'icon', $post->ID );
						$active = "active";
						if( $count > 1){
							$active = "";
						}
					 ?>
						<li><button class="persona <?php echo $active; ?>" data="<?php echo $slug;?>"><span class="icon"> <img src="<?php echo $icon; ?>"></span><span class="nome"><?php the_title();?></span></button></li>	
					<?php $count++; endwhile; ?>
				<?php endif; ?>
				</ul>
			</div>
			<div id="personagem" class="col-md-5 col-lg-5">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
					$slug 			= $post->post_name;
					$personagem 	= get_field( 'personagem', $post->ID );
				 ?>
				 <img src="<?php echo $personagem; ?>" data="<?php echo $slug;?>">
				 <?php endwhile; ?>
			<?php endif; ?>
			</div>
			<div id="descricao" class="col-md-4 col-lg-4">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
					$slug = $post->post_name;
				 ?>
				 <div class="content" data="<?php echo $slug;?>">
				 	<h3><?php the_title(); ?></h3>
				 	<?php the_content(); ?>
				 </div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>