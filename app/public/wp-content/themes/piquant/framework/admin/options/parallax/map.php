<?php

if ( ! function_exists('piquant_mikado_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function piquant_mikado_parallax_options_map()
	{

		piquant_mikado_add_admin_page(
			array(
				'slug' => '_parallax_page',
				'title' => 'Parallax',
				'icon' => 'fa fa-unsorted'
			)
		);

		$panel_parallax = piquant_mikado_add_admin_panel(
			array(
				'page'  => '_parallax_page',
				'name'  => 'panel_parallax',
				'title' => 'Parallax'
			)
		);

		piquant_mikado_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> 'Parallax on touch devices',
			'description'	=> 'Enabling this option will allow parallax on touch devices',
			'parent'		=> $panel_parallax
		));

		piquant_mikado_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> 'Parallax Min Height',
			'description'	=> 'Set a minimum height for parallax images on small displays (phones, tablets, etc.)',
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'piquant_mikado_options_map', 'piquant_mikado_parallax_options_map', 20 );

}