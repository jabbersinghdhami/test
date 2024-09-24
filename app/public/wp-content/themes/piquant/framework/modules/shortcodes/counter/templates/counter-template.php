<?php
/**
 * Counter shortcode template
 */
?>
<div <?php piquant_mikado_class_attribute($counter_classes); ?> <?php echo piquant_mikado_get_inline_style($counter_holder_styles); ?>>

	<span class="mkdf-counter <?php echo esc_attr($type) ?>" <?php echo piquant_mikado_get_inline_style($counter_styles); ?>>
		<?php echo esc_attr($digit); ?>
	</span>
	<h4 class="mkdf-counter-title">
		<?php echo esc_attr($title); ?>
	</h4>
	<?php if ($text != "") { ?>
		<p class="mkdf-counter-text"><?php echo esc_html($text); ?></p>
	<?php } ?>

</div>