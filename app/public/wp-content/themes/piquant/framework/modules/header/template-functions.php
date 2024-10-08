<?php

use Piquant\MikadofModules\Header\Lib\HeaderFactory;

if(!function_exists('piquant_mikado_get_header')) {
    /**
     * Loads header HTML based on header type option. Sets all necessary parameters for header
     * and defines piquant_mikado_header_type_parameters filter
     */
    function piquant_mikado_get_header() {

        //will be read from options
        $header_type     = piquant_mikado_options()->getOptionValue('header_type');
        $header_behavior = piquant_mikado_options()->getOptionValue('header_behaviour');

        extract(piquant_mikado_get_page_options());

        if(HeaderFactory::getInstance()->validHeaderObject()) {
            $parameters = array(
                'hide_logo'          => piquant_mikado_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
                'show_sticky'        => in_array($header_behavior, array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up'
                )) ? true : false,
                'show_fixed_wrapper' => in_array($header_behavior, array('fixed-on-scroll')) ? true : false,
                'vertical_header_background_color' => $vertical_header_background_color,
                'vertical_header_opacity' => $vertical_header_opacity,
                'vertical_background_image' => $vertical_background_image
            );

            $parameters = apply_filters('piquant_mikado_header_type_parameters', $parameters, $header_type);

            HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
        }
    }
}

if(!function_exists('piquant_mikado_get_header_top')) {
    /**
     * Loads header top HTML and sets parameters for it
     */
    function piquant_mikado_get_header_top() {

        //generate column width class
        switch(piquant_mikado_options()->getOptionValue('top_bar_layout')) {
            case ('two-columns'):
                $column_widht_class = '50-50';
                break;
            case ('three-columns'):
                $column_widht_class = piquant_mikado_options()->getOptionValue('top_bar_column_widths');
                break;
        }

        $params = array(
            'column_widths'      => $column_widht_class,
            'show_widget_center' => piquant_mikado_options()->getOptionValue('top_bar_layout') == 'three-columns' ? true : false,
            'show_header_top'    => piquant_mikado_options()->getOptionValue('top_bar') == 'yes' ? true : false,
            'top_bar_in_grid'    => piquant_mikado_options()->getOptionValue('top_bar_in_grid') == 'yes' ? true : false
        );

        $params = apply_filters('piquant_mikado_header_top_params', $params);

        piquant_mikado_get_module_template_part('templates/parts/header-top', 'header', '', $params);
    }
}

if(!function_exists('piquant_mikado_get_logo')) {
    /**
     * Loads logo HTML
     *
     * @param $slug
     */
    function piquant_mikado_get_logo($slug = '') {

        $slug = $slug !== '' ? $slug : piquant_mikado_options()->getOptionValue('header_type');

        if($slug == 'sticky'){
            $logo_image = piquant_mikado_options()->getOptionValue('logo_image_sticky');
        }else{
            $logo_image = piquant_mikado_options()->getOptionValue('logo_image');
        }

        $logo_image_dark = piquant_mikado_options()->getOptionValue('logo_image_dark');
        $logo_image_light = piquant_mikado_options()->getOptionValue('logo_image_light');


        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = piquant_mikado_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens
        }

        $params = array(
            'logo_image'  => $logo_image,
            'logo_image_dark' => $logo_image_dark,
            'logo_image_light' => $logo_image_light,
            'logo_styles' => $logo_styles
        );

        piquant_mikado_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
    }
}

if(!function_exists('piquant_mikado_get_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function piquant_mikado_get_main_menu($additional_class = 'mkdf-default-nav') {
        piquant_mikado_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if(!function_exists('piquant_mikado_get_vertical_main_menu')) {
    /**
     * Loads vertical menu HTML
     */
    function piquant_mikado_get_vertical_main_menu() {
        piquant_mikado_get_module_template_part('templates/parts/vertical-navigation', 'header', '');
    }
}



if(!function_exists('piquant_mikado_get_sticky_header')) {
    /**
     * Loads sticky header behavior HTML
     */
    function piquant_mikado_get_sticky_header() {

        $parameters = array(
            'hide_logo'             => piquant_mikado_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
            'sticky_header_in_grid' => piquant_mikado_options()->getOptionValue('sticky_header_in_grid') == 'yes' ? true : false
        );

        piquant_mikado_get_module_template_part('templates/behaviors/sticky-header', 'header', '', $parameters);
    }
}

if(!function_exists('piquant_mikado_get_mobile_header')) {
    /**
     * Loads mobile header HTML only if responsiveness is enabled
     */
    function piquant_mikado_get_mobile_header() {
        if(piquant_mikado_is_responsive_on()) {
            $header_type = piquant_mikado_options()->getOptionValue('header_type');

            //this could be read from theme options
            $mobile_header_type = 'mobile-header';

            $parameters = array(
                'show_logo'              => piquant_mikado_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
                'menu_opener_icon'       => piquant_mikado_icon_collections()->getMobileMenuIcon(piquant_mikado_options()->getOptionValue('mobile_icon_pack'), true),
                'show_navigation_opener' => has_nav_menu('main-navigation')
            );

            piquant_mikado_get_module_template_part('templates/types/'.$mobile_header_type, 'header', $header_type, $parameters);
        }
    }
}

if(!function_exists('piquant_mikado_get_mobile_logo')) {
    /**
     * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
     *
     * @param string $slug
     */
    function piquant_mikado_get_mobile_logo($slug = '') {

        $slug = $slug !== '' ? $slug : piquant_mikado_options()->getOptionValue('header_type');

        //check if mobile logo has been set and use that, else use normal logo
        if(piquant_mikado_options()->getOptionValue('logo_image_mobile') !== '') {
            $logo_image = piquant_mikado_options()->getOptionValue('logo_image_mobile');
        } else {
            $logo_image = piquant_mikado_options()->getOptionValue('logo_image');
        }

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = piquant_mikado_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px'; //divided with 2 because of retina screens
        }

        //set parameters for logo
        $parameters = array(
            'logo_image'      => $logo_image,
            'logo_dimensions' => $logo_dimensions,
            'logo_height'     => $logo_height,
            'logo_styles'     => $logo_styles
        );

        piquant_mikado_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
    }
}

if(!function_exists('piquant_mikado_get_mobile_nav')) {
    /**
     * Loads mobile navigation HTML
     */
    function piquant_mikado_get_mobile_nav() {

        $slug = piquant_mikado_options()->getOptionValue('header_type');

        piquant_mikado_get_module_template_part('templates/parts/mobile-navigation', 'header', $slug);
    }
}

if(!function_exists('piquant_mikado_get_sticky_nav')) {
    /**
     * Loads sticky navigation HTML
     */
    function piquant_mikado_get_sticky_nav() {

        $slug = piquant_mikado_options()->getOptionValue('header_type');

        piquant_mikado_get_module_template_part('templates/parts/sticky-navigation', 'header', $slug);
    }
}

if(!function_exists('piquant_mikado_get_page_options')) {
    /**
     * Gets options from page
     */
    function piquant_mikado_get_page_options() {
        $id = piquant_mikado_get_page_id();
        $page_options = array();
        $menu_area_background_color_rgba = '';
        $vertical_header_background_color = '';
        $vertical_header_opacity = '';
        $vertical_background_image = '';

        $header_type = piquant_mikado_options()->getOptionValue('header_type');

        $page_options['menu_area_background_color'] = $menu_area_background_color_rgba;
        $page_options['vertical_header_background_color'] = $vertical_header_background_color;
        $page_options['vertical_header_opacity'] = $vertical_header_opacity;
        $page_options['vertical_background_image'] = $vertical_background_image;

        return $page_options;
    }
}