<?php

/**
 * Shortcode handler
 */

	$classes = array( 'my-second-element' );
	$classes[] = $features;

?>

<div <?php cs_atts( array( 'id' => $id, 'class' => implode( ' ', $classes ), 'style' => $style ), true ); ?>>
<img src="<?php echo $image;?>" style="padding: <?php echo $image_padding; ?>;">
<?php echo $content; ?>
</div>
