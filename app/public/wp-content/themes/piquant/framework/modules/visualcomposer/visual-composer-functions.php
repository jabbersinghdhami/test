<?php

if(!function_exists('piquant_mikado_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function piquant_mikado_vc_grid_elements_enabled() {

		return (piquant_mikado_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('piquant_mikado_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function piquant_mikado_visual_composer_grid_elements() {

		if(!piquant_mikado_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'piquant_mikado_visual_composer_grid_elements', 12);
}

if(!function_exists('piquant_mikado_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function piquant_mikado_grid_elements_ajax_disable() {
		global $piquant_mikado_options;

		if(piquant_mikado_vc_grid_elements_enabled()) {
			$piquant_mikado_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'piquant_mikado_grid_elements_ajax_disable');
}


if(!function_exists('piquant_mikado_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function piquant_mikado_get_vc_version() {
		if(piquant_mikado_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}