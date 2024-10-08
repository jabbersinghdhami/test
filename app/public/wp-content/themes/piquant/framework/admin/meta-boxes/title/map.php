<?php

if(!function_exists('piquant_mikado_title_area_meta_box')) {
    function piquant_mikado_title_area_meta_box() {
        $title_meta_box = piquant_mikado_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post', 'restaurant-menu-item'),
                'title' => 'Title',
                'name'  => 'title_meta'
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_show_title_area_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Show Title Area',
                'description'   => 'Disabling this option will turn off page title area',
                'parent'        => $title_meta_box,
                'options'       => array(
                    ''    => '',
                    'no'  => 'No',
                    'yes' => 'Yes'
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '',
                        'no'  => '#mkdf_mkdf_show_title_area_meta_container',
                        'yes' => ''
                    ),
                    'show'       => array(
                        ''    => '#mkdf_mkdf_show_title_area_meta_container',
                        'no'  => '',
                        'yes' => '#mkdf_mkdf_show_title_area_meta_container'
                    )
                )
            )
        );

        $show_title_area_meta_container = piquant_mikado_add_admin_container(
            array(
                'parent'          => $title_meta_box,
                'name'            => 'mkdf_show_title_area_meta_container',
                'hidden_property' => 'mkdf_show_title_area_meta',
                'hidden_value'    => 'no'
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_type_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Title Area Type',
                'description'   => 'Choose title type',
                'parent'        => $show_title_area_meta_container,
                'options'       => array(
                    ''           => '',
                    'standard'   => 'Standard',
                    'breadcrumb' => 'Breadcrumb'
                ),
                'args'          => array(
                    "dependence" => true,
                    "hide"       => array(
                        "standard"   => "",
                        "standard"   => "",
                        "breadcrumb" => "#mkdf_mkdf_title_area_type_meta_container"
                    ),
                    "show"       => array(
                        ""           => "#mkdf_mkdf_title_area_type_meta_container",
                        "standard"   => "#mkdf_mkdf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = piquant_mikado_add_admin_container(
            array(
                'parent'          => $show_title_area_meta_container,
                'name'            => 'mkdf_title_area_type_meta_container',
                'hidden_property' => 'mkdf_title_area_type_meta',
                'hidden_value'    => '',
                'hidden_values'   => array('breadcrumb'),
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_enable_breadcrumbs_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Enable Breadcrumbs',
                'description'   => 'This option will display Breadcrumbs in Title Area',
                'parent'        => $title_area_type_meta_container,
                'options'       => array(
                    ''    => '',
                    'no'  => 'No',
                    'yes' => 'Yes'
                ),
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_animation_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Animations',
                'description'   => 'Choose an animation for Title Area',
                'parent'        => $show_title_area_meta_container,
                'options'       => array(
                    ''           => '',
                    'no'         => 'No Animation',
                    'right-left' => 'Text right to left',
                    'left-right' => 'Text left to right'
                )
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_vertial_alignment_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Vertical Alignment',
                'description'   => 'Specify title vertical alignment',
                'parent'        => $show_title_area_meta_container,
                'options'       => array(
                    ''              => '',
                    'header_bottom' => 'From Bottom of Header',
                    'window_top'    => 'From Window Top'
                )
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_content_alignment_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Horizontal Alignment',
                'description'   => 'Specify title content alignment',
                'parent'        => $show_title_area_meta_container,
                'options'       => array(
                    ''       => '',
                    'left'   => 'Left',
                    'center' => 'Center',
                    'right'  => 'Right'
                )
            )
        );

        piquant_mikado_add_meta_box_field(array(
            'name'          => 'mkdf_title_area_graphic_meta',
            'type'          => 'image',
            'default_value' => '',
            'label'         => 'Title Graphic',
            'description'   => 'Specify title area graphic',
            'parent'        => $show_title_area_meta_container
        ));

        piquant_mikado_add_meta_box_field(array(
                'name'          => 'mkdf_title_area_show_text_meta',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => 'Show Title Text',
                'description'   => 'Choose whether to show or hide title text',
                'parent'        => $show_title_area_meta_container,
                'args'          => array(
                    'dependence'                => true,
                    'dependence_hide_on_yes'    => '',
                    'dependence_show_on_yes'    => '#mkdf_mkdf_title_text_container'
                )
            )
        );

        $title_text_container = piquant_mikado_add_admin_container(array(
            'name'              => 'mkdf_title_text_container',
            'parent'            => $show_title_area_meta_container,
            'hidden_property'   => 'mkdf_title_area_show_text_meta',
            'hidden_value'      => 'no'
        ));

        piquant_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_title_text_color_meta',
                'type'        => 'color',
                'label'       => 'Title Color',
                'description' => 'Choose a color for title text',
                'parent'      => $title_text_container
            )
        );

        piquant_mikado_add_meta_box_field(array(
            'name'        => 'mkdf_title_text_size_meta',
            'type'        => 'select',
            'label'       => 'Choose title text size',
            'description' => 'Choose predefined size for title text',
            'parent'      => $title_text_container,
            'options'     => array(
                ''       => 'Default',
                'medium' => 'Medium',
                'large'  => 'Large'
            )
        ));

        piquant_mikado_add_meta_box_field(array(
            'name' => 'mkdf_disable_title_bottom_border_meta',
            'type' => 'yesno',
            'label' => 'Disable Title Bottom Border',
            'description' => 'This option will disable title area bottom border',
            'parent' => $show_title_area_meta_container,
            'default_value' => 'no'
        ));

        piquant_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_title_breadcrumb_color_meta',
                'type'        => 'color',
                'label'       => 'Breadcrumb Color',
                'description' => 'Choose a color for breadcrumb text',
                'parent'      => $show_title_area_meta_container
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_title_area_background_color_meta',
                'type'        => 'color',
                'label'       => 'Background Color',
                'description' => 'Choose a background color for Title Area',
                'parent'      => $show_title_area_meta_container
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_hide_background_image_meta',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Hide Background Image',
                'description'   => 'Enable this option to hide background image in Title Area',
                'parent'        => $show_title_area_meta_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "#mkdf_mkdf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = piquant_mikado_add_admin_container(
            array(
                'parent'          => $show_title_area_meta_container,
                'name'            => 'mkdf_hide_background_image_meta_container',
                'hidden_property' => 'mkdf_hide_background_image_meta',
                'hidden_value'    => 'yes'
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_title_area_background_image_meta',
                'type'        => 'image',
                'label'       => 'Background Image',
                'description' => 'Choose an Image for Title Area',
                'parent'      => $hide_background_image_meta_container
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_background_image_responsive_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Background Responsive Image',
                'description'   => 'Enabling this option will make Title background image responsive',
                'parent'        => $hide_background_image_meta_container,
                'options'       => array(
                    ''    => '',
                    'no'  => 'No',
                    'yes' => 'Yes'
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#mkdf_mkdf_title_area_background_image_responsive_meta_container, #mkdf_mkdf_title_area_height_meta'
                    ),
                    'show'       => array(
                        ''    => '#mkdf_mkdf_title_area_background_image_responsive_meta_container, #mkdf_mkdf_title_area_height_meta',
                        'no'  => '#mkdf_mkdf_title_area_background_image_responsive_meta_container, #mkdf_mkdf_title_area_height_meta',
                        'yes' => ''
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = piquant_mikado_add_admin_container(
            array(
                'parent'          => $hide_background_image_meta_container,
                'name'            => 'mkdf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'mkdf_title_area_background_image_responsive_meta',
                'hidden_value'    => 'yes'
            )
        );

        piquant_mikado_add_meta_box_field(
            array(
                'name'          => 'mkdf_title_area_background_image_parallax_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Background Image in Parallax',
                'description'   => 'Enabling this option will make Title background image parallax',
                'parent'        => $title_area_background_image_responsive_meta_container,
                'options'       => array(
                    ''         => '',
                    'no'       => 'No',
                    'yes'      => 'Yes',
                    'yes_zoom' => 'Yes, with zoom out'
                )
            )
        );

        piquant_mikado_add_meta_box_field(array(
            'name'        => 'mkdf_title_area_height_meta',
            'type'        => 'text',
            'label'       => 'Height',
            'description' => 'Set a height for Title Area',
            'parent'      => $show_title_area_meta_container,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));

        piquant_mikado_add_meta_box_field(array(
            'name'          => 'mkdf_title_area_subtitle_type_meta',
            'type'          => 'select',
            'default_value' => 'standard',
            'label'         => 'Subtitle Type',
            'description'   => 'Choose subtitle type',
            'parent'        => $show_title_area_meta_container,
            'options'       => array(
                'standard' => 'Standard',
                'restaurant'  => 'Restaurant'
            ),
            'args'          => array(
                'col_width' => 3
            )
        ));

        piquant_mikado_add_meta_box_field(array(
            'name'          => 'mkdf_title_area_subtitle_meta',
            'type'          => 'text',
            'default_value' => '',
            'label'         => 'Subtitle Text',
            'description'   => 'Enter your subtitle text',
            'parent'        => $show_title_area_meta_container,
            'args'          => array(
                'col_width' => 6
            )
        ));

        piquant_mikado_add_meta_box_field(
            array(
                'name'        => 'mkdf_subtitle_color_meta',
                'type'        => 'color',
                'label'       => 'Subtitle Color',
                'description' => 'Choose a color for subtitle text',
                'parent'      => $show_title_area_meta_container
            )
        );
    }

    add_action('piquant_mikado_meta_boxes_map', 'piquant_mikado_title_area_meta_box');
}