<?php

if ( ! function_exists('piquant_mikado_search_options_map') ) {

	function piquant_mikado_search_options_map() {

		piquant_mikado_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => 'Search',
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = piquant_mikado_add_admin_panel(
			array(
				'title' => 'Search',
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'search-slides-from-window-top',
				'label' 		=> 'Mikado Search Type',
				'description' 	=> "Choose a type of Mikado search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)",
				'options' 		=> array(
					'fullscreen-search' => 'Fullscreen Search',
					'search-slides-from-window-top' => 'Slide from Window Top'
				),
				'args'			=> array(
					'dependence'=> true,
					'hide'		=> array(
						'fullscreen-search' => '#mkdf_search_height_container',
						'search-slides-from-window-top' => '#mkdf_search_height_container, #mkdf_search_animation_container'
					),
					'show'		=> array(
						'fullscreen-search' => '#mkdf_search_animation_container',
						'search-slides-from-window-top' => ''
					)
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_awesome',
				'label'			=> 'Search Icon Pack',
				'description'	=> 'Choose icon pack for search icon',
				'options'		=> piquant_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons'))
			)
		);

		$search_height_container = piquant_mikado_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'search_height_container',
				'hidden_property'	=> 'search_type',
				'hidden_value'		=> '',
				'hidden_values'		=> array(
					'fullscreen-search',
					'search-slides-from-window-top'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_height_container,
				'type'			=> 'text',
				'name'			=> 'search_height',
				'default_value'	=> '',
				'label'			=> 'Search bar height',
				'description'	=> 'Set search bar height',
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_animation_container = piquant_mikado_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'search_animation_container',
				'hidden_property'	=> 'search_type',
				'hidden_value'		=> '',
				'hidden_values'		=> array(
					'search-slides-from-window-top'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_animation_container,
				'type'			=> 'select',
				'name'			=> 'search_animation',
				'default_value'	=> 'search-fade',
				'label'			=> 'Fullscreen Search Overlay Animation',
				'description'	=> 'Choose animation for fullscreen search overlay',
				'options'		=> array(
					'search-fade'			=> 'Fade',
					'search-from-circle'	=> 'Circle appear'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'yes',
				'label'			=> 'Search area in grid',
				'description'	=> 'Set search area to be in grid',
			)
		);

		piquant_mikado_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> 'Initial Search Icon in Header'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> 'Icon Size',
				'description'	=> 'Set size for icon',
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Icon Colors',
				'description'	=> 'Define color style for icon',
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> 'Color'
			)
		);
		piquant_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> 'Hover Color'
			)
		);
		piquant_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> 'Light Header Icon Color'
			)
		);
		piquant_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> 'Light Header Icon Hover Color'
			)
		);

		$search_icon_color_row2 = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> 'Dark Header Icon Color'
			)
		);
		piquant_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> 'Dark Header Icon Hover Color'
			)
		);


		$search_icon_background_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Icon Background Style',
				'description'	=> 'Define background style for icon',
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> 'Background Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> 'Background Hover Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> 'Enable Search Icon Text',
				'description'	=> "Enable this option to show 'Search' text next to search icon in header",
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = piquant_mikado_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> 'Search Icon Text',
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> 'Define Style for Search Icon Text'
			)
		);

		$enable_search_icon_text_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> 'Text Color',
				'default_value'	=> ''
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> 'Text Hover Color',
				'default_value'	=> ''
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> 'Font Size',
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> 'Line Height',
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> 'Text Transform',
				'default_value'	=> '',
				'options'		=> piquant_mikado_get_text_transform_array()
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> 'Font Family',
				'default_value'	=> '-1',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> 'Font Style',
				'default_value'	=> '',
				'options'		=> piquant_mikado_get_font_style_array(),
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> 'Font Weight',
				'default_value'	=> '',
				'options'		=> piquant_mikado_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> 'Letter Spacing',
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Icon Spacing',
				'description'	=> 'Define padding and margins for Search icon',
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> 'Padding Left',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> 'Padding Right',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> 'Margin Left',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> 'Margin Right',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		piquant_mikado_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> 'Search Bar'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> 'Background Color',
				'description'	=> 'Choose a background color for Mikado search bar'
			)
		);

		$search_input_text_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Search Input Text',
				'description'	=> 'Define style for search text',
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> 'Text Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_disabled_color',
				'default_value'	=> '',
				'label'			=> 'Disabled Text Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> 'Font Size',
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> 'Text Transform',
				'options'		=> piquant_mikado_get_text_transform_array()
			)
		);

		$search_input_text_row2 = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> 'Font Family',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> 'Font Style',
				'options'		=> piquant_mikado_get_font_style_array(),
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> 'Font Weight',
				'options'		=> piquant_mikado_get_font_weight_array()
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> 'Letter Spacing',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_label_text_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Search Label Text',
				'description'	=> 'Define style for search label text',
				'name'		=> 'search_label_text_group'
			)
		);

		$search_label_text_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_label_text_color',
				'default_value'	=> '',
				'label'			=> 'Text Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_fontsize',
				'default_value'	=> '',
				'label'			=> 'Font Size',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_texttransform',
				'default_value'	=> '',
				'label'			=> 'Text Transform',
				'options'		=> piquant_mikado_get_text_transform_array()
			)
		);

		$search_label_text_row2 = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row2',
				'next'		=> true
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_label_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> 'Font Family',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontstyle',
				'default_value'	=> '',
				'label'			=> 'Font Style',
				'options'		=> piquant_mikado_get_font_style_array()
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontweight',
				'default_value'	=> '',
				'label'			=> 'Font Weight',
				'options'		=> piquant_mikado_get_font_weight_array()
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_letterspacing',
				'default_value'	=> '',
				'label'			=> 'Letter Spacing',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Search Icon',
				'description'	=> 'Define style for search icon',
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> 'Icon Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> 'Icon Hover Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_disabled_color',
				'default_value'	=> '',
				'label'			=> 'Icon Disabled Color',
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> 'Icon Size',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Search Close',
				'description'	=> 'Define style for search close icon',
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> 'Icon Color',
				'default_value'	=> ''
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> 'Icon Hover Color',
				'default_value'	=> ''
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> 'Icon Size',
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = piquant_mikado_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Search Bottom Border',
				'description'	=> 'Define style for Search text input bottom border (for Fullscreen search type)',
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = piquant_mikado_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> 'Border Color',
				'default_value'	=> ''
			)
		);

		piquant_mikado_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> 'Border Focus Color',
				'default_value'	=> ''
			)
		);

	}

	add_action('piquant_mikado_options_map', 'piquant_mikado_search_options_map', 5);

}