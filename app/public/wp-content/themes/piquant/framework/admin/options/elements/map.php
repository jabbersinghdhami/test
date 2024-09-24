<?php

if ( ! function_exists('piquant_mikado_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function piquant_mikado_load_elements_map() {

		piquant_mikado_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => 'Elements',
				'icon' => 'fa fa-star'
			)
		);

		do_action( 'piquant_mikado_options_elements_map' );

	}

	add_action('piquant_mikado_options_map', 'piquant_mikado_load_elements_map', 14);

}