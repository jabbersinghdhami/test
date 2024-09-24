<?php

if(!function_exists('piquant_mikado_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function piquant_mikado_button_typography_styles() {
        $selector = '.mkdf-btn';
        $styles = array();

        $font_family = piquant_mikado_options()->getOptionValue('button_font_family');
        if(piquant_mikado_is_font_option_valid($font_family)) {
            $styles['font-family'] = piquant_mikado_get_font_option_val($font_family);
        }

        $text_transform = piquant_mikado_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = piquant_mikado_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = piquant_mikado_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = piquant_mikado_filter_px($letter_spacing).'px';
        }

        $font_weight = piquant_mikado_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo piquant_mikado_dynamic_css($selector, $styles);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_button_typography_styles');
}

if(!function_exists('piquant_mikado_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function piquant_mikado_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_selector = '.mkdf-btn.mkdf-btn-outline';

        if(piquant_mikado_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = piquant_mikado_options()->getOptionValue('btn_outline_text_color');
        }

        if(piquant_mikado_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = piquant_mikado_options()->getOptionValue('btn_outline_border_color');
        }

        echo piquant_mikado_dynamic_css($outline_selector, $outline_styles);

        //outline hover styles
        if(piquant_mikado_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo piquant_mikado_dynamic_css(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-color):hover',
                array('color' => piquant_mikado_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(piquant_mikado_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo piquant_mikado_dynamic_css(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
                array('background-color' => piquant_mikado_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(piquant_mikado_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo piquant_mikado_dynamic_css(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
                array('border-color' => piquant_mikado_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_button_outline_styles');
}

if(!function_exists('piquant_mikado_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function piquant_mikado_button_solid_styles() {
        //solid styles
        $solid_selector = '.mkdf-btn.mkdf-btn-solid';
        $solid_styles = array();

        if(piquant_mikado_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = piquant_mikado_options()->getOptionValue('btn_solid_text_color');
        }

        if(piquant_mikado_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = piquant_mikado_options()->getOptionValue('btn_solid_border_color');
        }

        if(piquant_mikado_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_styles['background-color'] = piquant_mikado_options()->getOptionValue('btn_solid_bg_color');
        }

        echo piquant_mikado_dynamic_css($solid_selector, $solid_styles);

        //solid hover styles
        if(piquant_mikado_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo piquant_mikado_dynamic_css(
                '.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-hover-color):hover',
                array('color' => piquant_mikado_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(piquant_mikado_options()->getOptionValue('btn_solid_hover_bg_color')) {
            echo piquant_mikado_dynamic_css(
                '.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-hover-bg):hover',
                array('background-color' => piquant_mikado_options()->getOptionValue('btn_solid_hover_bg_color').'!important')
            );
        }

        if(piquant_mikado_options()->getOptionValue('btn_solid_hover_border_color')) {
            echo piquant_mikado_dynamic_css(
                '.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-hover-bg):hover',
                array('border-color' => piquant_mikado_options()->getOptionValue('btn_solid_hover_border_color').'!important')
            );
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_button_solid_styles');
}