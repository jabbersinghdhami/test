<?php

if(!function_exists('piquant_mikado_header_meta_box_map')) {
    function piquant_mikado_header_meta_box_map() {
        $header_meta_box = piquant_mikado_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post', 'restaurant-menu-item'),
                'title' => 'Header',
                'name'  => 'header_meta'
            )
        );
        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_header_style_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Header Skin',
                'description'   => 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style',
                'parent'        => $header_meta_box,
                'options'       => array(
                    ''             => '',
                    'light-header' => 'Light',
                    'dark-header'  => 'Dark'
                )
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'parent'        => $header_meta_box,
                'type'          => 'select',
                'name'          => 'mkdf_enable_header_style_on_scroll_meta',
                'default_value' => '',
                'label'         => 'Enable Header Style on Scroll',
                'description'   => 'Enabling this option, header will change style depending on row settings for dark/light style',
                'options'       => array(
                    ''    => '',
                    'no'  => 'No',
                    'yes' => 'Yes'
                )
            )
        );

        switch(piquant_mikado_options()->getOptionValue('header_type')) {
            case 'header-standard':

                piquant_mikado_add_meta_box_field(
                    array(
                        'name'        => 'mkdf_menu_area_background_color_header_standard_meta',
                        'type'        => 'color',
                        'label'       => 'Background Color',
                        'description' => 'Choose a background color for header area',
                        'parent'      => $header_meta_box
                    )
                );

                piquant_mikado_add_meta_box_field(
                    array(
                        'name'        => 'mkdf_menu_area_background_transparency_header_standard_meta',
                        'type'        => 'text',
                        'label'       => 'Transparency',
                        'description' => 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)',
                        'parent'      => $header_meta_box,
                        'args'        => array(
                            'col_width' => 2
                        )
                    )
                );

                piquant_mikado_add_meta_box_field(array(
                    'name'          => 'mkdf_menu_area_bottom_border_disable_header_standard_meta',
                    'type'          => 'yesno',
                    'label'         => 'Disable Header Bottom Border',
                    'description'   => 'Enabling this option will disable bottom border on header',
                    'parent'        => $header_meta_box,
                    'default_value' => 'no',
                    'args'          => array(
                        'dependence'             => true,
                        'dependence_hide_on_yes' => '#mkdf_border_bottom_color_container',
                        'dependence_show_on_yes' => ''
                    )
                ));

                $border_bottom_color_container = piquant_mikado_add_admin_container(array(
                    'type'   => 'container',
                    'name'   => 'border_bottom_color_container',
                    'parent' => $header_meta_box,
                    'args'   => array(
                        'hidden_property' => 'mkdf_menu_area_bottom_border_disable_header_standard_meta',
                        'hidden_value'    => 'yes'
                    )
                ));

                piquant_mikado_add_meta_box_field(array(
                    'name'        => 'mkdf_menu_area_bottom_border_color_meta',
                    'type'        => 'color',
                    'label'       => 'Header Bottom Border Color',
                    'description' => 'Choose color of header bottom border',
                    'parent'      => $border_bottom_color_container
                ));

                break;
        }

        $top_bar_container = piquant_mikado_add_admin_container_no_style(array(
            'name'   => 'top_bar_container_no_style',
            'parent' => $header_meta_box,
            'args'   => array(
                'hidden_property' => 'top_bar',
                'hidden_value'    => 'no'
            )
        ));

        piquant_mikado_add_meta_box_field(array(
            'name'   => 'mkdf_top_bar_background_color_meta',
            'type'   => 'color',
            'label'  => 'Top Bar Background Color',
            'parent' => $top_bar_container
        ));

        piquant_mikado_add_meta_box_field(array(
            'name'        => 'mkdf_top_bar_background_transparency_meta',
            'type'        => 'text',
            'label'       => 'Top Bar Background Color Transparency',
            'description' => 'Set top bar background color transparenct. Value should be between 0 and 1',
            'parent'      => $top_bar_container,
            'args'        => array(
                'col_width' => 3
            )
        ));

        piquant_mikado_add_meta_box_field(array(
            'name'          => 'mkdf_top_bar_border_enable_meta',
            'type'          => 'yesno',
            'label'         => 'Enable Top Bar Bottom Border',
            'description'   => 'Enabling this option will enable bottom border on top bar',
            'parent'        => $top_bar_container,
            'default_value' => 'no',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_top_bar_border_bottom_color_container'
            )
        ));
    }

    add_action('piquant_mikado_meta_boxes_map', 'piquant_mikado_header_meta_box_map');
}

