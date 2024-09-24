<?php

if(!function_exists('piquant_mikado_side_area_slide_from_right_type_style')) {

	function piquant_mikado_side_area_slide_from_right_type_style() {

		if(piquant_mikado_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

			if(piquant_mikado_options()->getOptionValue('side_area_width') !== '' && piquant_mikado_options()->getOptionValue('side_area_width') >= 30) {
				echo piquant_mikado_dynamic_css('.mkdf-side-menu-slide-from-right .mkdf-side-menu', array(
					'right' => '-'.piquant_mikado_options()->getOptionValue('side_area_width').'%',
					'width' => piquant_mikado_options()->getOptionValue('side_area_width').'%'
				));
			}

			if(piquant_mikado_options()->getOptionValue('side_area_content_overlay_color') !== '') {

				echo piquant_mikado_dynamic_css('.mkdf-side-menu-slide-from-right .mkdf-wrapper .mkdf-cover', array(
					'background-color' => piquant_mikado_options()->getOptionValue('side_area_content_overlay_color')
				));

			}
			if(piquant_mikado_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

				echo piquant_mikado_dynamic_css('.mkdf-side-menu-slide-from-right.mkdf-right-side-menu-opened .mkdf-wrapper .mkdf-cover', array(
					'opacity' => piquant_mikado_options()->getOptionValue('side_area_content_overlay_opacity')
				));

			}
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_slide_from_right_type_style');

}

if(!function_exists('piquant_mikado_side_area_icon_color_styles')) {

	function piquant_mikado_side_area_icon_color_styles() {

		if(piquant_mikado_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo piquant_mikado_dynamic_css('a.mkdf-side-menu-button-opener', array(
				'font-size' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_font_size')).'px'
			));

			if(piquant_mikado_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						a.mkdf-side-menu-button-opener {
						font-size: 30px;
						}
					}';
			}

		}

		if(piquant_mikado_options()->getOptionValue('side_area_icon_color') !== '') {

			echo piquant_mikado_dynamic_css('a.mkdf-side-menu-button-opener', array(
				'color' => piquant_mikado_options()->getOptionValue('side_area_icon_color')
			));

		}
		if(piquant_mikado_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo piquant_mikado_dynamic_css('a.mkdf-side-menu-button-opener:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('side_area_icon_hover_color')
			));

		}
		if(piquant_mikado_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo piquant_mikado_dynamic_css('.mkdf-light-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-side-menu-button-opener,
			.mkdf-light-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-side-menu-button-opener,
			.mkdf-light-header .mkdf-top-bar .mkdf-side-menu-button-opener', array(
				'color' => piquant_mikado_options()->getOptionValue('side_area_light_icon_color').' !important'
			));

		}
		if(piquant_mikado_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo piquant_mikado_dynamic_css('.mkdf-light-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-side-menu-button-opener:hover,
			.mkdf-light-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-side-menu-button-opener:hover,
			.mkdf-light-header .mkdf-top-bar .mkdf-side-menu-button-opener:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('side_area_light_icon_hover_color').' !important'
			));

		}
		if(piquant_mikado_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo piquant_mikado_dynamic_css('.mkdf-dark-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-side-menu-button-opener,
			.mkdf-dark-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-side-menu-button-opener,
			.mkdf-dark-header .mkdf-top-bar .mkdf-side-menu-button-opener', array(
				'color' => piquant_mikado_options()->getOptionValue('side_area_dark_icon_color').' !important'
			));

		}
		if(piquant_mikado_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo piquant_mikado_dynamic_css('.mkdf-dark-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-side-menu-button-opener:hover,
			.mkdf-dark-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-side-menu-button-opener:hover,
			.mkdf-dark-header .mkdf-top-bar .mkdf-side-menu-button-opener:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('side_area_dark_icon_hover_color').' !important'
			));

		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_icon_color_styles');

}

if(!function_exists('piquant_mikado_side_area_icon_spacing_styles')) {

	function piquant_mikado_side_area_icon_spacing_styles() {
		$icon_spacing = array();

		if(piquant_mikado_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_padding_left')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_padding_right')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_margin_left')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_margin_right')).'px';
		}

		if(!empty($icon_spacing)) {

			echo piquant_mikado_dynamic_css('a.mkdf-side-menu-button-opener', $icon_spacing);

		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_icon_spacing_styles');
}

if(!function_exists('piquant_mikado_side_area_icon_border_styles')) {

	function piquant_mikado_side_area_icon_border_styles() {
		if(piquant_mikado_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

			$side_area_icon_border = array();

			if(piquant_mikado_options()->getOptionValue('side_area_icon_border_color') !== '') {
				$side_area_icon_border['border-color'] = piquant_mikado_options()->getOptionValue('side_area_icon_border_color');
			}

			if(piquant_mikado_options()->getOptionValue('side_area_icon_border_width') !== '') {
				$side_area_icon_border['border-width'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_border_width')).'px';
			} else {
				$side_area_icon_border['border-width'] = '1px';
			}

			if(piquant_mikado_options()->getOptionValue('side_area_icon_border_radius') !== '') {
				$side_area_icon_border['border-radius'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_icon_border_radius')).'px';
			}

			if(piquant_mikado_options()->getOptionValue('side_area_icon_border_style') !== '') {
				$side_area_icon_border['border-style'] = piquant_mikado_options()->getOptionValue('side_area_icon_border_style');
			} else {
				$side_area_icon_border['border-style'] = 'solid';
			}

			if(!empty($side_area_icon_border)) {
				$side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
				$side_area_icon_border['transition']         = 'all 0.15s ease-out';
				echo piquant_mikado_dynamic_css('a.mkdf-side-menu-button-opener', $side_area_icon_border);
			}

			if(piquant_mikado_options()->getOptionValue('a.mkdf-side-menu-button-opener:hover') !== '') {
				$side_area_icon_border['border-color'] = piquant_mikado_options()->getOptionValue('side_area_icon_border_hover_color');
			}


		}
	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_icon_border_styles');

}

if(!function_exists('piquant_mikado_side_area_alignment')) {

	function piquant_mikado_side_area_alignment() {

		if(piquant_mikado_options()->getOptionValue('side_area_aligment')) {

			echo piquant_mikado_dynamic_css('.mkdf-side-menu-slide-from-right .mkdf-side-menu, .mkdf-side-menu-slide-with-content .mkdf-side-menu, .mkdf-side-area-uncovered-from-content .mkdf-side-menu', array(
				'text-align' => piquant_mikado_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_alignment');

}

if(!function_exists('piquant_mikado_side_area_styles')) {

	function piquant_mikado_side_area_styles() {

		$side_area_styles = array();

		if(piquant_mikado_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = piquant_mikado_options()->getOptionValue('side_area_background_color');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_padding_top')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_padding_right')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_padding_bottom')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_padding_left')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_bakground_image') !== '') {
			$side_area_styles['background-image'] = 'url('.piquant_mikado_options()->getOptionValue('side_area_bakground_image').')';
			$side_area_styles['background-size'] = 'cover';
		}

		if(!empty($side_area_styles)) {
			echo piquant_mikado_dynamic_css('.mkdf-side-menu', $side_area_styles);
		}

		if(piquant_mikado_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo piquant_mikado_dynamic_css('.mkdf-side-menu a.mkdf-close-side-menu span, .mkdf-side-menu a.mkdf-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if(piquant_mikado_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-side-menu a.mkdf-close-side-menu', array(
				'height'      => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
				'width'       => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
				'line-height' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
				'padding'     => 0,
			));
			echo piquant_mikado_dynamic_css('.mkdf-side-menu a.mkdf-close-side-menu span, .mkdf-side-menu a.mkdf-close-side-menu i', array(
				'font-size'   => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
				'height'      => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
				'width'       => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
				'line-height' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_close_icon_size')).'px',
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_styles');

}

if(!function_exists('piquant_mikado_side_area_title_styles')) {

	function piquant_mikado_side_area_title_styles() {

		$title_styles = array();

		if(piquant_mikado_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = piquant_mikado_options()->getOptionValue('side_area_title_color');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_title_fontsize')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_title_lineheight')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = piquant_mikado_options()->getOptionValue('side_area_title_texttransform');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('side_area_title_google_fonts')).', sans-serif';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = piquant_mikado_options()->getOptionValue('side_area_title_fontstyle');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = piquant_mikado_options()->getOptionValue('side_area_title_fontweight');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_title_letterspacing')).'px';
		}

		if(!empty($title_styles)) {

			echo piquant_mikado_dynamic_css('.mkdf-side-menu-title h4, .mkdf-side-menu-title h5', $title_styles);

		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_title_styles');

}

if(!function_exists('piquant_mikado_side_area_text_styles')) {

	function piquant_mikado_side_area_text_styles() {
		$text_styles = array();

		if(piquant_mikado_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('side_area_text_google_fonts')).', sans-serif';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_text_fontsize')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_text_lineheight')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('side_area_text_letterspacing')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = piquant_mikado_options()->getOptionValue('side_area_text_fontweight');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = piquant_mikado_options()->getOptionValue('side_area_text_fontstyle');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = piquant_mikado_options()->getOptionValue('side_area_text_texttransform');
		}

		if(piquant_mikado_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = piquant_mikado_options()->getOptionValue('side_area_text_color');
		}

		if(!empty($text_styles)) {

			echo piquant_mikado_dynamic_css('.mkdf-side-menu .widget, .mkdf-side-menu .widget.widget_search form, .mkdf-side-menu .widget.widget_search form input[type="text"], .mkdf-side-menu .widget.widget_search form input[type="submit"], .mkdf-side-menu .widget h6, .mkdf-side-menu .widget h6 a, .mkdf-side-menu .widget p, .mkdf-side-menu .widget li a, .mkdf-side-menu .widget.widget_rss li a.rsswidget, .mkdf-side-menu #wp-calendar caption,.mkdf-side-menu .widget li, .mkdf-side-menu h3, .mkdf-side-menu .widget.widget_archive select, .mkdf-side-menu .widget.widget_categories select, .mkdf-side-menu .widget.widget_text select, .mkdf-side-menu .widget.widget_search form input[type="submit"], .mkdf-side-menu #wp-calendar th, .mkdf-side-menu #wp-calendar td, .mkdf-side-menu .q_social_icon_holder i.simple_social', $text_styles);

		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_text_styles');

}

if(!function_exists('piquant_mikado_side_area_link_styles')) {

	function piquant_mikado_side_area_link_styles() {
		$link_styles = array();

		if(piquant_mikado_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('sidearea_link_font_family')).',sans-serif';
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('sidearea_link_font_size')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('sidearea_link_line_height')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('sidearea_link_letter_spacing')).'px';
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = piquant_mikado_options()->getOptionValue('sidearea_link_font_weight');
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = piquant_mikado_options()->getOptionValue('sidearea_link_font_style');
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = piquant_mikado_options()->getOptionValue('sidearea_link_text_transform');
		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = piquant_mikado_options()->getOptionValue('sidearea_link_color');
		}

		if(!empty($link_styles)) {

			echo piquant_mikado_dynamic_css('.mkdf-side-menu .widget li a, .mkdf-side-menu .widget a:not(.qbutton)', $link_styles);

		}

		if(piquant_mikado_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-side-menu .widget a:hover, .mkdf-side-menu .widget li:hover, .mkdf-side-menu .widget li:hover>a', array(
				'color' => piquant_mikado_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_link_styles');

}

if(!function_exists('piquant_mikado_side_area_border_styles')) {

	function piquant_mikado_side_area_border_styles() {

		if(piquant_mikado_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

			if(piquant_mikado_options()->getOptionValue('side_area_bottom_border_color') !== '') {

				echo piquant_mikado_dynamic_css('.mkdf-side-menu .widget', array(
					'border-bottom:'  => '1px solid '.piquant_mikado_options()->getOptionValue('side_area_bottom_border_color'),
					'margin-bottom:'  => '10px',
					'padding-bottom:' => '10px',
				));

			}

		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_side_area_border_styles');

}