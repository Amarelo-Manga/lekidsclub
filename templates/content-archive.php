<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package Neat
 */

$logoHotel	= get_field( 'logo_hotel_thumb', $post->ID );
$thumb 		= get_field( 'thumb', $post->ID );
$title 		= get_field( 'titulo_thumb', $post->ID );
$classe 	= "";
if( !empty($logoHotel) ){
	$classe = "titulo";
}
?>

<article class="col-md-6 col-lg-4">
	<h4 class="content_azul"><span class="<?php echo $classe; ?>"><?php echo $title; ?></span><span class="img"><img src="<?php echo $logoHotel; ?>"></span></h4>
	<img src="<?php echo $thumb; ?>" />
	<a href="<?php echo get_permalink(); ?>" class="btn_rosa">Ver detalhes</a>
</article>