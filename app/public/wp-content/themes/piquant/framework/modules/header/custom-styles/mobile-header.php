<?php

if(!function_exists('piquant_mikado_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function piquant_mikado_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(piquant_mikado_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(piquant_mikado_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = piquant_mikado_options()->getOptionValue('mobile_header_background_color');
        }

        echo piquant_mikado_dynamic_css('.mkdf-mobile-header .mkdf-mobile-header-inner', $mobile_header_styles);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_mobile_header_general_styles');
}

if(!function_exists('piquant_mikado_mobile_navigation_styles')) {
    /**
     * Generates styles for mobile navigation
     */
    function piquant_mikado_mobile_navigation_styles() {
        $mobile_nav_styles = array();
        if(piquant_mikado_options()->getOptionValue('mobile_menu_background_color')) {
            $mobile_nav_styles['background-color'] = piquant_mikado_options()->getOptionValue('mobile_menu_background_color');
        }

        echo piquant_mikado_dynamic_css('.mkdf-mobile-header .mkdf-mobile-nav', $mobile_nav_styles);

        $mobile_nav_item_styles = array();
        if(piquant_mikado_options()->getOptionValue('mobile_menu_separator_color') !== '') {
            $mobile_nav_item_styles['border-bottom-color'] = piquant_mikado_options()->getOptionValue('mobile_menu_separator_color');
        }

        if(piquant_mikado_options()->getOptionValue('mobile_text_color') !== '') {
            $mobile_nav_item_styles['color'] = piquant_mikado_options()->getOptionValue('mobile_text_color');
        }

        if(piquant_mikado_is_font_option_valid(piquant_mikado_options()->getOptionValue('mobile_font_family'))) {
            $mobile_nav_item_styles['font-family'] = piquant_mikado_get_formatted_font_family(piquant_mikado_options()->getOptionValue('mobile_font_family'));
        }

        if(piquant_mikado_options()->getOptionValue('mobile_font_size') !== '') {
            $mobile_nav_item_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_font_size')).'px';
        }

        if(piquant_mikado_options()->getOptionValue('mobile_line_height') !== '') {
            $mobile_nav_item_styles['line-height'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_line_height')).'px';
        }

        if(piquant_mikado_options()->getOptionValue('mobile_text_transform') !== '') {
            $mobile_nav_item_styles['text-transform'] = piquant_mikado_options()->getOptionValue('mobile_text_transform');
        }

        if(piquant_mikado_options()->getOptionValue('mobile_font_style') !== '') {
            $mobile_nav_item_styles['font-style'] = piquant_mikado_options()->getOptionValue('mobile_font_style');
        }

        if(piquant_mikado_options()->getOptionValue('mobile_font_weight') !== '') {
            $mobile_nav_item_styles['font-weight'] = piquant_mikado_options()->getOptionValue('mobile_font_weight');
        }

        $mobile_nav_item_selector = array(
            '.mkdf-mobile-header .mkdf-mobile-nav a',
            '.mkdf-mobile-header .mkdf-mobile-nav h4'
        );

        echo piquant_mikado_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

        $mobile_nav_item_hover_styles = array();
        if(piquant_mikado_options()->getOptionValue('mobile_text_hover_color') !== '') {
            $mobile_nav_item_hover_styles['color'] = piquant_mikado_options()->getOptionValue('mobile_text_hover_color');
        }

        $mobile_nav_item_selector_hover = array(
            '.mkdf-mobile-header .mkdf-mobile-nav a:hover',
            '.mkdf-mobile-header .mkdf-mobile-nav h4:hover'
        );

        echo piquant_mikado_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_mobile_navigation_styles');
}

if(!function_exists('piquant_mikado_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function piquant_mikado_mobile_logo_styles() {
        if(piquant_mikado_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1000px) {
            <?php echo piquant_mikado_dynamic_css(
                '.mkdf-mobile-header .mkdf-mobile-logo-wrapper a',
                array('height' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(piquant_mikado_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo piquant_mikado_dynamic_css(
                '.mkdf-mobile-header .mkdf-mobile-logo-wrapper a',
                array('height' => piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }

        if(piquant_mikado_options()->getOptionValue('mobile_header_height') !== '') {
            $max_height = intval(piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
            echo piquant_mikado_dynamic_css('.mkdf-mobile-header .mkdf-mobile-logo-wrapper a', array('max-height' => $max_height));
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_mobile_logo_styles');
}

if(!function_exists('piquant_mikado_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function piquant_mikado_mobile_icon_styles() {
        $mobile_icon_styles = array();
        if(piquant_mikado_options()->getOptionValue('mobile_icon_color') !== '') {
            $mobile_icon_styles['color'] = piquant_mikado_options()->getOptionValue('mobile_icon_color');
        }

        if(piquant_mikado_options()->getOptionValue('mobile_icon_size') !== '') {
            $mobile_icon_styles['font-size'] = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('mobile_icon_size')).'px';
        }

        echo piquant_mikado_dynamic_css('.mkdf-mobile-header .mkdf-mobile-menu-opener a', $mobile_icon_styles);

        if(piquant_mikado_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo piquant_mikado_dynamic_css(
                '.mkdf-mobile-header .mkdf-mobile-menu-opener a:hover',
                array('color' => piquant_mikado_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_mobile_icon_styles');
}