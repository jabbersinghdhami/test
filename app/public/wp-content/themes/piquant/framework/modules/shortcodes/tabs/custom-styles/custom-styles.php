<?php
if(!function_exists('piquant_mikado_tabs_typography_styles')){
	function piquant_mikado_tabs_typography_styles(){
		$selector = '.mkdf-tabs .mkdf-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = piquant_mikado_options()->getOptionValue('tabs_font_family');
		
		if(piquant_mikado_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = piquant_mikado_is_font_option_valid($font_family);
		}
		
		$text_transform = piquant_mikado_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = piquant_mikado_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = piquant_mikado_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = piquant_mikado_filter_px($letter_spacing).'px';
        }

        $font_weight = piquant_mikado_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo piquant_mikado_dynamic_css($selector, $styles);
	}
	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_tabs_typography_styles');
}

if(!function_exists('piquant_mikado_tabs_inital_color_styles')){
	function piquant_mikado_tabs_inital_color_styles(){
		$selector = '.mkdf-tabs .mkdf-tabs-nav li a';
		$styles = array();
		
		if(piquant_mikado_options()->getOptionValue('tabs_color')) {
            $styles['color'] = piquant_mikado_options()->getOptionValue('tabs_color');
        }
		if(piquant_mikado_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = piquant_mikado_options()->getOptionValue('tabs_back_color');
        }
		if(piquant_mikado_options()->getOptionValue('tabs_border_color')) {
            $styles['border-color'] = piquant_mikado_options()->getOptionValue('tabs_border_color');
        }
		
		echo piquant_mikado_dynamic_css($selector, $styles);
	}
	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_tabs_typography_styles');
}
if(!function_exists('piquant_mikado_tabs_active_color_styles')){
	function piquant_mikado_tabs_active_color_styles(){
		$selector = '.mkdf-tabs .mkdf-tabs-nav li.ui-state-active a, .mkdf-tabs .mkdf-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(piquant_mikado_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = piquant_mikado_options()->getOptionValue('tabs_color_active');
        }
		if(piquant_mikado_options()->getOptionValue('tabs_back_color_active')) {
            $styles['background-color'] = piquant_mikado_options()->getOptionValue('tabs_back_color_active');
        }
		if(piquant_mikado_options()->getOptionValue('tabs_border_color_active')) {
            $styles['border-color'] = piquant_mikado_options()->getOptionValue('tabs_border_color_active');
        }
		
		echo piquant_mikado_dynamic_css($selector, $styles);
	}
	add_action('piquant_mikado_style_dynamic', 'piquant_mikado_tabs_active_color_styles');
}