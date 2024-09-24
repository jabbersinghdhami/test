<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="mkdf-blockquote-shortcode" <?php piquant_mikado_inline_style($blockquote_style); ?>>
	<<?php echo esc_attr($blockquote_title_tag); ?> class="mkdf-blockquote-text">
	<span><?php echo esc_attr($text); ?></span>
	</<?php echo esc_attr($blockquote_title_tag);?>>
</blockquote>