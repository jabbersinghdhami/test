<?php

if(!function_exists('piquant_mikado_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function piquant_mikado_header_register_main_navigation() {
        register_nav_menus(
            array(
                'main-navigation' => esc_html__('Main Navigation', 'piquant')
            )
        );
    }

    add_action('after_setup_theme', 'piquant_mikado_header_register_main_navigation');
}

if(!function_exists('piquant_mikado_is_top_bar_transparent')) {
    /**
     * Checks if top bar is transparent or not
     *
     * @return bool
     */
    function piquant_mikado_is_top_bar_transparent() {
        $top_bar_enabled = piquant_mikado_is_top_bar_enabled();
        $id = piquant_mikado_get_page_id();

        $top_bar_bg_color = piquant_mikado_get_meta_field_intersect('top_bar_background_color', $id);
        $top_bar_transparency = piquant_mikado_get_meta_field_intersect('top_bar_background_transparency', $id);

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
        }

        return false;
    }
}

if(!function_exists('piquant_mikado_is_top_bar_completely_transparent')) {
    function piquant_mikado_is_top_bar_completely_transparent() {
        $top_bar_enabled = piquant_mikado_is_top_bar_enabled();

        $top_bar_bg_color = piquant_mikado_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = piquant_mikado_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency === '0';
        }

        return false;
    }
}

if(!function_exists('piquant_mikado_is_top_bar_enabled')) {
    function piquant_mikado_is_top_bar_enabled() {
        $top_bar_enabled = piquant_mikado_options()->getOptionValue('top_bar') == 'yes';

        return $top_bar_enabled;
    }
}

if(!function_exists('piquant_mikado_get_top_bar_height')) {
    /**
     * Returns top bar height
     *
     * @return bool|int|void
     */
    function piquant_mikado_get_top_bar_height() {
        if(piquant_mikado_is_top_bar_enabled()) {
            $top_bar_height = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('top_bar_height'));

            return $top_bar_height !== '' ? intval($top_bar_height) : 51;
        }

        return 0;
    }
}

if(!function_exists('piquant_mikado_get_sticky_header_height')) {
    /**
     * Returns top sticky header height
     *
     * @return bool|int|void
     */
    function piquant_mikado_get_sticky_header_height() {
        //sticky menu height, needed only for sticky header on scroll up
        if(in_array(piquant_mikado_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up'))) {

            $sticky_header_height = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }

        return 0;

    }
}

if(!function_exists('piquant_mikado_get_sticky_header_height_of_complete_transparency')) {
    /**
     * Returns top sticky header height it is fully transparent. used in anchor logic
     *
     * @return bool|int|void
     */
    function piquant_mikado_get_sticky_header_height_of_complete_transparency() {
        if(piquant_mikado_options()->getOptionValue('sticky_header_transparency') === '0') {
            $stickyHeaderTransparent = piquant_mikado_options()->getOptionValue('sticky_header_grid_background_color') !== '' &&
                                       piquant_mikado_options()->getOptionValue('sticky_header_grid_transparency') === '0';
        } else {
            $stickyHeaderTransparent = piquant_mikado_options()->getOptionValue('sticky_header_background_color') !== '' &&
                                       piquant_mikado_options()->getOptionValue('sticky_header_transparency') === '0';
        }

        if($stickyHeaderTransparent) {
            return 0;
        } else {
            $sticky_header_height = piquant_mikado_filter_px(piquant_mikado_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }
    }
}

if(!function_exists('piquant_mikado_get_sticky_scroll_amount')) {
    /**
     * Returns top sticky scroll amount
     *

     * @return bool|int|void
     */
    function piquant_mikado_get_sticky_scroll_amount() {

        //sticky menu scroll amount
        if(in_array(piquant_mikado_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount = piquant_mikado_filter_px(piquant_mikado_get_meta_field_intersect('mkdf_scroll_amount_for_sticky'));

            return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
        }

        return 0;

    }
}