<?php

$seo_meta_box = piquant_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post', 'restaurant-menu-item'),
        'title' => 'SEO',
        'name' => 'seo_meta'
    )
);


    piquant_mikado_add_meta_box_field(
        array(
            'name' => 'mkdf_meta_title_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => 'Meta Title',
            'description' => 'Enter custom title for this page',
            'parent' => $seo_meta_box
        )
    );

    piquant_mikado_add_meta_box_field(
        array(
            'name' => 'mkdf_meta_keywords_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => 'Meta Keywords',
            'description' => 'Add relevant keywords separated with commas',
            'parent' => $seo_meta_box
        )
    );

    piquant_mikado_add_meta_box_field(
        array(
            'name'        => 'mkdf_meta_description_meta',
            'type'        => 'text',
            'label'       => 'Meta Description',
            'description' => 'Enter meta description for this page',
            'parent'      => $seo_meta_box
        )
    );