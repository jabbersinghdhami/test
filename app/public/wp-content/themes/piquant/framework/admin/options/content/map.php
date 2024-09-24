<?php

if(!function_exists('piquant_mikado_content_options_map')) {

	function piquant_mikado_content_options_map() {

		piquant_mikado_add_admin_page(
			array(
				'slug'  => '_content_page',
				'title' => 'Content',
				'icon'  => 'fa fa-file-text-o'
			)
		);

		$panel_content = piquant_mikado_add_admin_panel(
			array(
				'page'  => '_content_page',
				'name'  => 'panel_content',
				'title' => 'General'
			)
		);

		piquant_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'content_top_padding',
			'description'   => 'Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value',
			'default_value' => '0',
			'label'         => 'Content Top Padding for Template in Full Width',
			'args'          => array(
				'suffix'    => 'px',
				'col_width' => 3
			),
			'parent'        => $panel_content
		));

		piquant_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'content_top_padding_in_grid',
			'description'   => 'Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value',
			'default_value' => '72',
			'label'         => 'Content Top Padding for Templates in Grid',
			'args'          => array(
				'suffix'    => 'px',
				'col_width' => 3
			),
			'parent'        => $panel_content
		));

		piquant_mikado_add_admin_field(array(
			'type'          => 'text',
			'name'          => 'content_top_padding_mobile',
			'description'   => 'Enter top padding for content area for devices smaller that 1024px',
			'default_value' => '0',
			'label'         => 'Content Top Padding for Tablet and Mobile Devices',
			'args'          => array(
				'suffix'    => 'px',
				'col_width' => 3
			),
			'parent'        => $panel_content
		));

		$panel_content_bottom = piquant_mikado_add_admin_panel(
			array(
				'page'  => '_content_page',
				'name'  => 'panel_content_bottom',
				'title' => 'Content Bottom Area'
			)
		);

		piquant_mikado_add_admin_field(array(
			'name'          => 'enable_content_bottom_area',
			'type'          => 'yesno',
			'default_value' => 'no',
			'label'         => 'Enable Content Bottom Area',
			'description'   => 'This option will enable Content Bottom area on pages',
			'args'          => array(
				'dependence'             => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#mkdf_enable_content_bottom_area_container'
			),
			'parent'        => $panel_content_bottom
		));

		$enable_content_bottom_area_container = piquant_mikado_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'hidden_property' => 'enable_content_bottom_area',
				'hidden_value'    => 'no'
			)
		);

		$custom_sidebars = piquant_mikado_get_custom_sidebars();

		piquant_mikado_add_admin_field(array(
			'type'          => 'selectblank',
			'name'          => 'content_bottom_sidebar_custom_display',
			'default_value' => '',
			'label'         => 'Widget Area to display',
			'description'   => 'Choose a Content Bottom sidebar to display',
			'options'       => $custom_sidebars,
			'parent'        => $enable_content_bottom_area_container
		));

		piquant_mikado_add_admin_field(array(
			'type'          => 'yesno',
			'name'          => 'content_bottom_in_grid',
			'default_value' => 'yes',
			'label'         => 'Display in Grid',
			'description'   => 'Enabling this option will place Content Bottom in grid',
			'parent'        => $enable_content_bottom_area_container
		));

		piquant_mikado_add_admin_field(array(
			'type'          => 'color',
			'name'          => 'content_bottom_background_color',
			'default_value' => '',
			'label'         => 'Background Color',
			'description'   => 'Choose a background color for Content Bottom area',
			'parent'        => $enable_content_bottom_area_container
		));
	}

	add_action('piquant_mikado_options_map', 'piquant_mikado_content_options_map', 7);
}