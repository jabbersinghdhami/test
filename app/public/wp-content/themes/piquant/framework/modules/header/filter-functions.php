<?php

if(!function_exists('piquant_mikado_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function piquant_mikado_header_class($classes) {
        $header_type = piquant_mikado_get_meta_field_intersect('header_type', piquant_mikado_get_page_id());

        $classes[] = 'mkdf-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_header_class');
}

if(!function_exists('piquant_mikado_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function piquant_mikado_header_behaviour_class($classes) {

        $classes[] = 'mkdf-'.piquant_mikado_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_header_behaviour_class');
}

if(!function_exists('piquant_mikado_menu_item_icon_position_class')) {
    /**
     * Function that adds menu item icon position class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added menu item icon position class
     */
    function piquant_mikado_menu_item_icon_position_class($classes) {

        if(piquant_mikado_options()->getOptionValue('menu_item_icon_position') == 'top'){
            $classes[] = 'mkdf-menu-with-large-icons';
        }

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_menu_item_icon_position_class');
}

if(!function_exists('piquant_mikado_mobile_header_class')) {
    function piquant_mikado_mobile_header_class($classes) {
        $classes[] = 'mkdf-default-mobile-header';

        $classes[] = 'mkdf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_mobile_header_class');
}

if(!function_exists('piquant_mikado_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     * @param array array of classes from main filter
     * @return array array of classes with added first level menu background color class
     */
    function piquant_mikado_header_class_first_level_bg_color($classes) {

        //check if first level hover background color is set
        if(piquant_mikado_options()->getOptionValue('menu_hover_background_color') !== ''){
            $classes[]= 'mkdf-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_header_class_first_level_bg_color');
}

if(!function_exists('piquant_mikado_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function piquant_mikado_menu_dropdown_appearance($classes) {

        if(piquant_mikado_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'mkdf-'.piquant_mikado_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_menu_dropdown_appearance');
}

if (!function_exists('piquant_mikado_header_skin_class')) {

    function piquant_mikado_header_skin_class( $classes ) {

        $id = piquant_mikado_get_page_id();

		if(get_post_meta($id, 'mkdf_header_style_meta', true) !== ''){
			$classes[] = 'mkdf-' . get_post_meta($id, 'mkdf_header_style_meta', true);
		} else if ( piquant_mikado_options()->getOptionValue('header_style') !== '' ) {
            $classes[] = 'mkdf-' . piquant_mikado_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'piquant_mikado_header_skin_class');

}

if (!function_exists('piquant_mikado_header_scroll_style_class')) {

	function piquant_mikado_header_scroll_style_class( $classes ) {

		if (piquant_mikado_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes' ) {
			$classes[] = 'mkdf-header-style-on-scroll';
		}

		return $classes;

	}

	add_filter('body_class', 'piquant_mikado_header_scroll_style_class');

}

if(!function_exists('piquant_mikado_header_global_js_var')) {
    function piquant_mikado_header_global_js_var($global_variables) {

        $global_variables['mkdfTopBarHeight'] = piquant_mikado_get_top_bar_height();
        $global_variables['mkdfStickyHeaderHeight'] = piquant_mikado_get_sticky_header_height();
        $global_variables['mkdfStickyHeaderTransparencyHeight'] = piquant_mikado_get_sticky_header_height_of_complete_transparency();

        return $global_variables;
    }

    add_filter('piquant_mikado_js_global_variables', 'piquant_mikado_header_global_js_var');
}

if(!function_exists('piquant_mikado_header_per_page_js_var')) {
    function piquant_mikado_header_per_page_js_var($perPageVars) {

        $perPageVars['mkdfStickyScrollAmount'] = piquant_mikado_get_sticky_scroll_amount();

        return $perPageVars;
    }

    add_filter('piquant_mikado_per_page_js_vars', 'piquant_mikado_header_per_page_js_var');
}

if(!function_exists('piquant_mikado_header_bottom_border_class')) {
    function piquant_mikado_header_bottom_border_class($classes) {
        $id = piquant_mikado_get_page_id();

        $disable_border = get_post_meta($id, 'mkdf_menu_area_bottom_border_disable_header_standard_meta', true) == 'yes';
        if($disable_border) {
            $classes[] = 'mkdf-header-standard-border-disable';
        }

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_header_bottom_border_class');
}

if(!function_exists('mkdf_top_bar_classes')) {
    function mkdf_top_bar_classes($classes) {
		$id = piquant_mikado_get_page_id();
		$enable_bottom_border = get_post_meta($id, 'mkdf_top_bar_border_enable_meta', true) === 'yes';
		$top_bar_in_grid = piquant_mikado_options()->getOptionValue('top_bar_in_grid') === 'yes';

		if($enable_bottom_border) {
			$classes[] = 'mkdf-top-bar-with-border';
		}

		if($top_bar_in_grid) {
			$classes[] = 'mkdf-top-bar-in-grid';
		} else {
			$classes[] = 'mkdf-top-bar-full-width';
		}

		return $classes;
    }

    add_filter('body_class', 'mkdf_top_bar_classes');
}

if(!function_exists('mkdf_top_bar_per_page_styles')) {
    function mkdf_top_bar_per_page_styles($styles) {
		$id            		 = piquant_mikado_get_page_id();
		$top_bar_style 		 = array();
		$top_bar_grid_style  = array();

		$top_bar_bg_color    = get_post_meta($id, 'mkdf_top_bar_background_color_meta', true);

		$class_prefix = piquant_mikado_get_unique_page_class();
		$top_bar_selector = array(
			$class_prefix.' .mkdf-top-bar'
		);

		$top_bar_grid_selector = array(
			$class_prefix.' .mkdf-top-bar .mkdf-grid'
		);

		if($top_bar_bg_color !== '') {
			$top_bar_transparency = get_post_meta($id, 'mkdf_top_bar_background_transparency_meta', true);
			if($top_bar_transparency === '') {
				$top_bar_transparency = 1;
			}

			$top_bar_style['background-color'] = piquant_mikado_rgba_color($top_bar_bg_color, $top_bar_transparency);
		}

		$styles[] = piquant_mikado_dynamic_css($top_bar_selector, $top_bar_style);
		$styles[] = piquant_mikado_dynamic_css($top_bar_grid_selector, $top_bar_grid_style);

		return $styles;
    }

	add_filter('piquant_mikado_add_page_custom_style', 'mkdf_top_bar_per_page_styles');
}