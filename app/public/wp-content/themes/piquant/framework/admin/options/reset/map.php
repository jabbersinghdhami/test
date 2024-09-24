<?php

if(!function_exists('piquant_mikado_reset_options_map')) {
	/**
	 * Reset options panel
	 */
	function piquant_mikado_reset_options_map() {

		piquant_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => 'Reset',
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = piquant_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => 'Reset'
			)
		);

		piquant_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'reset_to_defaults',
			'default_value' => 'no',
			'label'         => 'Reset to Defaults',
			'description'   => 'This option will reset all Mikado Options values to defaults',
			'parent'        => $panel_reset
		));

	}

	add_action('piquant_mikado_options_map', 'piquant_mikado_reset_options_map', 100);
}