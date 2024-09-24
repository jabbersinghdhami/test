<?php

if(!function_exists('piquant_mikado_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function piquant_mikado_register_top_header_areas() {
        $top_bar_layout  = piquant_mikado_options()->getOptionValue('top_bar_layout');
        $top_bar_enabled = piquant_mikado_options()->getOptionValue('top_bar');

        if($top_bar_enabled == 'yes') {
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'piquant'),
                'id'            => 'mkdf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'piquant'),
                    'id'            => 'mkdf-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'piquant'),
                'id'            => 'mkdf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
        }
    }

    add_action('widgets_init', 'piquant_mikado_register_top_header_areas');
}

if(!function_exists('piquant_mikado_header_standard_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function piquant_mikado_header_standard_widget_areas() {
        if(piquant_mikado_options()->getOptionValue('header_type') == 'header-standard') {
            register_sidebar(array(
                'name'          => esc_html__('Right From Main Menu', 'piquant'),
                'id'            => 'mkdf-right-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-right-from-main-menu-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'piquant')
            ));
        }
    }

    add_action('widgets_init', 'piquant_mikado_header_standard_widget_areas');
}

if(!function_exists('piquant_mikado_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function piquant_mikado_register_mobile_header_areas() {
        if(piquant_mikado_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'piquant'),
                'id'            => 'mkdf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'piquant')
            ));
        }
    }

    add_action('widgets_init', 'piquant_mikado_register_mobile_header_areas');
}

if(!function_exists('piquant_mikado_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function piquant_mikado_register_sticky_header_areas() {
        if(in_array(piquant_mikado_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'piquant'),
                'id'            => 'mkdf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'piquant')
            ));
        }
    }

    add_action('widgets_init', 'piquant_mikado_register_sticky_header_areas');
}