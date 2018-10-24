<?php 

$logo_left = get_field('logo_left', 'option');
$nome_left = get_field('nome_left', 'option');
$link_left = get_field('link_left', 'option');
$logo_right = get_field('logo_right', 'option');
$nome_right = get_field('nome_right', 'option');
$link_right = get_field('link_right', 'option');

?>
<footer>
	<div class="container-fluid">
		<div class="row">
			<?php 
				if(!empty($logo_left)){
			?>
			<div class="col-md-2">
				<a href="<?php echo $link_left; ?>" alt="<?php echo $nome_left; ?>">
			 		<img src="<?php echo $logo_left; ?>" alt="<?php echo $nome_left; ?>" title="<?php echo $nome_left; ?>" />
			 	</a>
			</div>
			<?php 
				}//if logo_left
			?>
			<div class="col-md-8">
				<ul>
			<?php 
				if( have_rows('frise', 'option') ): 
				 	while( have_rows('frise', 'option') ): the_row();
				 		$logo = get_sub_field('logo');
				 		$nome = get_sub_field('nome_hotel');
				 		$link = get_sub_field('link_hotel');
			?>
				 <li>
				 	<a href="<?php echo $link; ?>" alt="<?php echo $nome; ?>" target="_blank">
				 		<img src="<?php echo $logo; ?>" alt="<?php echo $nome; ?>" title="<?php echo $nome; ?>" />
				 	</a>
				 </li>
			<?php   
				 	endwhile; 
				endif; 
			?>
				</ul>
			</div>
			<div class="col-md-2">
				<a href="<?php echo $link_right; ?>" alt="<?php echo $nome_right; ?>">
			 		<img src="<?php echo $logo_right; ?>" alt="<?php echo $nome_right; ?>" title="<?php echo $nome_right; ?>" />
			 	</a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>