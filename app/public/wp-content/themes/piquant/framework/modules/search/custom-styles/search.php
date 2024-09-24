<?php

if (!function_exists('piquant_mikado_search_covers_header_style')) {

	function piquant_mikado_search_covers_header_style()
	{

		if (piquant_mikado_options()->getOptionValue('search_height') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-header-bottom.mkdf-animated .mkdf-form-holder-outer, .mkdf-search-slide-header-bottom .mkdf-form-holder-outer, .mkdf-search-slide-header-bottom', array(
				'height' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_height')) . 'px'
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_covers_header_style');

}

if (!function_exists('piquant_mikado_search_opener_icon_size')) {

	function piquant_mikado_search_opener_icon_size()
	{

		if (piquant_mikado_options()->getOptionValue('header_search_icon_size')) {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener', array(
				'font-size' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_opener_icon_size');

}

if (!function_exists('piquant_mikado_search_opener_icon_colors')) {

	function piquant_mikado_search_opener_icon_colors()
	{

		if (piquant_mikado_options()->getOptionValue('header_search_icon_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener', array(
				'color' => piquant_mikado_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (piquant_mikado_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (piquant_mikado_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-light-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-search-opener,
			.mkdf-light-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-search-opener,
			.mkdf-light-header .mkdf-top-bar .mkdf-search-opener', array(
				'color' => piquant_mikado_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (piquant_mikado_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-light-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-search-opener:hover,
			.mkdf-light-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-search-opener:hover,
			.mkdf-light-header .mkdf-top-bar .mkdf-search-opener:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (piquant_mikado_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-dark-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-search-opener,
			.mkdf-dark-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-search-opener,
			.mkdf-dark-header .mkdf-top-bar .mkdf-search-opener', array(
				'color' => piquant_mikado_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (piquant_mikado_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-dark-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-search-opener:hover,
			.mkdf-dark-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-search-opener:hover,
			.mkdf-dark-header .mkdf-top-bar .mkdf-search-opener:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_opener_icon_colors');

}

if (!function_exists('piquant_mikado_search_opener_icon_background_colors')) {

	function piquant_mikado_search_opener_icon_background_colors()
	{

		if (piquant_mikado_options()->getOptionValue('search_icon_background_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener', array(
				'background-color' => piquant_mikado_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (piquant_mikado_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener:hover', array(
				'background-color' => piquant_mikado_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_opener_icon_background_colors');
}

if (!function_exists('piquant_mikado_search_opener_text_styles')) {

	function piquant_mikado_search_opener_text_styles()
	{
		$text_styles = array();

		if (piquant_mikado_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = piquant_mikado_options()->getOptionValue('search_icon_text_color');
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = piquant_mikado_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = piquant_mikado_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = piquant_mikado_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo piquant_mikado_dynamic_css('.mkdf-search-icon-text', $text_styles);
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => piquant_mikado_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_opener_text_styles');
}

if (!function_exists('piquant_mikado_search_opener_spacing')) {

	function piquant_mikado_search_opener_spacing()
	{
		$spacing_styles = array();

		if (piquant_mikado_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo piquant_mikado_dynamic_css('.mkdf-search-opener', $spacing_styles);
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_opener_spacing');
}

if (!function_exists('piquant_mikado_search_bar_background')) {

	function piquant_mikado_search_bar_background()
	{

		if (piquant_mikado_options()->getOptionValue('search_background_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-header-bottom, .mkdf-search-cover, .mkdf-search-fade .mkdf-fullscreen-search-holder .mkdf-fullscreen-search-table, .mkdf-fullscreen-search-overlay, .mkdf-search-slide-window-top, .mkdf-search-slide-window-top input[type="text"]', array(
				'background-color' => piquant_mikado_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_bar_background');
}

if (!function_exists('piquant_mikado_search_text_styles')) {

	function piquant_mikado_search_text_styles()
	{
		$text_styles = array();

		if (piquant_mikado_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = piquant_mikado_options()->getOptionValue('search_text_color');
		}
		if (piquant_mikado_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = piquant_mikado_options()->getOptionValue('search_text_texttransform');
		}
		if (piquant_mikado_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (piquant_mikado_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = piquant_mikado_options()->getOptionValue('search_text_fontstyle');
		}
		if (piquant_mikado_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = piquant_mikado_options()->getOptionValue('search_text_fontweight');
		}
		if (piquant_mikado_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-header-bottom input[type="text"], .mkdf-search-cover input[type="text"], .mkdf-fullscreen-search-holder .mkdf-search-field, .mkdf-search-slide-window-top input[type="text"]', $text_styles);
		}
		if (piquant_mikado_options()->getOptionValue('search_text_disabled_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-header-bottom.mkdf-disabled input[type="text"]::-webkit-input-placeholder, .mkdf-search-slide-header-bottom.mkdf-disabled input[type="text"]::-moz-input-placeholder', array(
				'color' => piquant_mikado_options()->getOptionValue('search_text_disabled_color')
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_text_styles');
}

if (!function_exists('piquant_mikado_search_label_styles')) {

	function piquant_mikado_search_label_styles()
	{
		$text_styles = array();

		if (piquant_mikado_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = piquant_mikado_options()->getOptionValue('search_label_text_color');
		}
		if (piquant_mikado_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (piquant_mikado_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = piquant_mikado_options()->getOptionValue('search_label_text_texttransform');
		}
		if (piquant_mikado_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (piquant_mikado_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = piquant_mikado_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (piquant_mikado_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = piquant_mikado_options()->getOptionValue('search_label_text_fontweight');
		}
		if (piquant_mikado_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo piquant_mikado_dynamic_css('.mkdf-fullscreen-search-holder .mkdf-search-label', $text_styles);
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_label_styles');
}

if (!function_exists('piquant_mikado_search_icon_styles')) {

	function piquant_mikado_search_icon_styles()
	{

		if (piquant_mikado_options()->getOptionValue('search_icon_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-window-top > i, .mkdf-search-slide-header-bottom .mkdf-search-submit i, .mkdf-fullscreen-search-holder .mkdf-search-submit', array(
				'color' => piquant_mikado_options()->getOptionValue('search_icon_color')
			));
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-window-top > i:hover, .mkdf-search-slide-header-bottom .mkdf-search-submit i:hover, .mkdf-fullscreen-search-holder .mkdf-search-submit:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_disabled_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-header-bottom.mkdf-disabled .mkdf-search-submit i, .mkdf-search-slide-header-bottom.mkdf-disabled .mkdf-search-submit i:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('search_icon_disabled_color')
			));
		}
		if (piquant_mikado_options()->getOptionValue('search_icon_size') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-window-top > i, .mkdf-search-slide-header-bottom .mkdf-search-submit i, .mkdf-fullscreen-search-holder .mkdf-search-submit', array(
				'font-size' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_icon_styles');
}

if (!function_exists('piquant_mikado_search_close_icon_styles')) {

	function piquant_mikado_search_close_icon_styles()
	{

		if (piquant_mikado_options()->getOptionValue('search_close_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-window-top .mkdf-search-close i, .mkdf-search-cover .mkdf-search-close i, .mkdf-fullscreen-search-close i', array(
				'color' => piquant_mikado_options()->getOptionValue('search_close_color')
			));
		}
		if (piquant_mikado_options()->getOptionValue('search_close_hover_color') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-window-top .mkdf-search-close i:hover, .mkdf-search-cover .mkdf-search-close i:hover, .mkdf-fullscreen-search-close i:hover', array(
				'color' => piquant_mikado_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (piquant_mikado_options()->getOptionValue('search_close_size') !== '') {
			echo piquant_mikado_dynamic_css('.mkdf-search-slide-window-top .mkdf-search-close i, .mkdf-search-cover .mkdf-search-close i, .mkdf-fullscreen-search-close i', array(
				'font-size' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_search_close_icon_styles');
}

?>
