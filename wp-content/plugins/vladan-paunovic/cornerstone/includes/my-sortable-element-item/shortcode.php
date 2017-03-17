<?php

/**
 * Shortcode handler
 */

$class = 'my-sortable-element-item ' . $class;
?>

<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
<?php echo ( $linked ) ? 'LINKED' : 'UNLINKED'; ?>
</div>
