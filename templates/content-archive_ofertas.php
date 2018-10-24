<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package Neat
 */

$logoHotel	= get_field( 'logo_hotel_thumb', $post->ID );
$thumb 		= get_field( 'thumb', $post->ID );
$classe 	= "";
$hotel 		= get_field( 'nome_hotel', $post->ID );
$promocao	= get_field( 'nome_oferta', $post->ID );
if( !empty($logoHotel) ){
	$classe = "titulo";
}
?>

<article class="col-md-6 col-lg-4">
	<h4 class="content_azul"><span class="<?php echo $classe; ?>"><?php echo $promocao; ?><br /><?php echo $hotel; ?></span><span class="img"><img src="<?php echo $logoHotel; ?>"></span></h4>
	<img src="<?php echo $thumb; ?>" />
	<a href="<?php echo get_permalink(); ?>" class="btn_rosa">Ver detalhes</a>
</article>