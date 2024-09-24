<?php
/**
 * Custom styles for Counter shortcode
 * Hooks to piquant_mikado_style_dynamic hook
 */

if (!function_exists('piquant_mikado_woo_single_style')) {

	function piquant_mikado_woo_single_style() {

        $styles = array();

		if (piquant_mikado_options()->getOptionValue('hide_product_info') === 'yes') {
			$styles['display'] = 'none';
		}

        $selector = array(
            '.single.single-product .product_meta'
        );

        echo piquant_mikado_dynamic_css($selector, $styles);

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_woo_single_style');

}

?>