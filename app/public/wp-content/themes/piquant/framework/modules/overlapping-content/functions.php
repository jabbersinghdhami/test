<?php

if(!function_exists('piquant_mikado_overlapping_content_enabled')) {
    /**
     * Checks if overlapping content is enabled
     *
     * @return bool
     */
    function piquant_mikado_overlapping_content_enabled() {
        $id = piquant_mikado_get_page_id();

        return get_post_meta($id, 'mkdf_overlapping_content_enable_meta', true) === 'yes';
    }
}

if(!function_exists('piquant_mikado_overlapping_content_class')) {
    /**
     * Adds overlapping content class to body tag
     * if overlapping content is enabled
     * @param $classes
     *
     * @return array
     */
    function piquant_mikado_overlapping_content_class($classes) {
        if(piquant_mikado_overlapping_content_enabled()) {
            $classes[] = 'mkdf-overlapping-content-enabled';
        }

        return $classes;
    }

    add_filter('body_class', 'piquant_mikado_overlapping_content_class');
}

if(!function_exists('piquant_mikado_overlapping_content_amount')) {
    /**
     * Returns amount of overlapping content
     *
     * @return int
     */
    function piquant_mikado_overlapping_content_amount() {
        return 116;
    }
}

if(!function_exists('piquant_mikado_oc_content_top_padding')) {
    function piquant_mikado_oc_content_top_padding($style) {
	    $id = piquant_mikado_get_page_id();

	    $class_prefix = piquant_mikado_get_unique_page_class();

	    $content_selector = array(
		    $class_prefix.' .mkdf-content .mkdf-content-inner > .mkdf-container .mkdf-overlapping-content'
	    );

	    $content_class = array();

	    $page_padding_top = get_post_meta($id, 'mkdf_page_content_top_padding', true);

	    if($page_padding_top !== '') {
		    if(get_post_meta($id, 'mkdf_page_content_top_padding_mobile', true) == 'yes') {
			    $content_class['padding-top'] = piquant_mikado_filter_px($page_padding_top).'px!important';
		    } else {
			    $content_class['padding-top'] = piquant_mikado_filter_px($page_padding_top).'px';
		    }

		    $style[] = piquant_mikado_dynamic_css($content_selector, $content_class);
	    }

	    return $style;
    }

	add_filter('piquant_mikado_add_page_custom_style', 'piquant_mikado_oc_content_top_padding');
}