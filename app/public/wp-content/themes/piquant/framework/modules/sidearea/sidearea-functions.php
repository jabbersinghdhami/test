<?php
if (!function_exists('piquant_mikado_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function piquant_mikado_register_side_area_sidebar() {

		register_sidebar(array(
			'name' => 'Side Area',
			'id' => 'sidearea', //TODO Change name of sidebar
			'description' => 'Side Area',
			'before_widget' => '<div id="%1$s" class="widget mkdf-sidearea %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="mkdf-sidearea-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'piquant_mikado_register_side_area_sidebar');

}

if(!function_exists('piquant_mikado_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function piquant_mikado_side_menu_body_class($classes) {

		if (is_active_widget( false, false, 'mkdf_side_area_opener' )) {

			if (piquant_mikado_options()->getOptionValue('side_area_type')) {

				$classes[] = 'mkdf-' . piquant_mikado_options()->getOptionValue('side_area_type');

				if (piquant_mikado_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'mkdf-' . piquant_mikado_options()->getOptionValue('side_area_slide_with_content_width');

				}

        	}

		}

		return $classes;

    }

    add_filter('body_class', 'piquant_mikado_side_menu_body_class');
}


if(!function_exists('piquant_mikado_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function piquant_mikado_get_side_area() {

		if (is_active_widget( false, false, 'mkdf_side_area_opener' )) {

			$parameters = array(
				'show_side_area_title' => piquant_mikado_options()->getOptionValue('side_area_title') !== '' ? true : false, //Dont show title if empty
			);

			piquant_mikado_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if (!function_exists('piquant_mikado_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function piquant_mikado_get_side_area_title() {

		$parameters = array(
			'side_area_title' => piquant_mikado_options()->getOptionValue('side_area_title')
		);

		piquant_mikado_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

if(!function_exists('piquant_mikado_get_side_menu_icon_html')) {
    /**
     * Function that outputs html for side area icon opener.
     * Uses $mkdPiquantIconCollections global variable
     * @return string generated html
     */
    function piquant_mikado_get_side_menu_icon_html() {

        $icon_html = '';

		if (piquant_mikado_options()->getOptionValue('side_area_button_icon_pack') !== '') {
			$icon_pack = piquant_mikado_options()->getOptionValue('side_area_button_icon_pack');

			$icons = piquant_mikado_icon_collections()->getIconCollection($icon_pack);
			$icon_options_field = 'side_area_icon_' . $icons->param;

			if (piquant_mikado_options()->getOptionValue($icon_options_field) !== '') {

				$icon = piquant_mikado_options()->getOptionValue($icon_options_field);
				$icon_html = piquant_mikado_icon_collections()->renderIcon($icon, $icon_pack, array(
					'icon_attributes' => array(
						'class' => 'mkdf-side-area-icon'
					)
				));

			}

		}

        return $icon_html;
    }
}