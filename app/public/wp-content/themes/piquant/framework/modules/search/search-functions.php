<?php

if( !function_exists('piquant_mikado_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function piquant_mikado_search_body_class($classes) {

		if ( is_active_widget( false, false, 'mkd_search_opener' ) ) {

			$classes[] = 'mkdf-' . piquant_mikado_options()->getOptionValue('search_type');

			if ( piquant_mikado_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'mkdf-' . piquant_mikado_options()->getOptionValue('search_animation');

			}

		}
		return $classes;

	}

	add_filter('body_class', 'piquant_mikado_search_body_class');
}

if ( ! function_exists('piquant_mikado_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function piquant_mikado_get_search() {

		if ( piquant_mikado_active_widget( false, false, 'mkd_search_opener' ) ) {

			$search_type = piquant_mikado_options()->getOptionValue('search_type');

			if ($search_type == 'search-slides-from-window-top') {
				piquant_mikado_set_search_position_in_menu( $search_type );
				if ( piquant_mikado_is_responsive_on() ) {
					piquant_mikado_set_search_position_mobile();
				}
				return;
			}

			piquant_mikado_load_search_template();

		}
	}

}

if ( ! function_exists('piquant_mikado_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function piquant_mikado_set_position_for_covering_search() {

		$containing_sidebar = piquant_mikado_active_widget( false, false, 'mkd_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'piquant_mikado_after_header_top_html_open', 'piquant_mikado_load_search_template');
			} else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
				add_action( 'piquant_mikado_after_header_menu_area_html_open', 'piquant_mikado_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'piquant_mikado_after_mobile_header_html_open', 'piquant_mikado_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'piquant_mikado_after_header_logo_area_html_open', 'piquant_mikado_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'piquant_mikado_after_sticky_menu_html_open', 'piquant_mikado_load_search_template');
			}

		}

	}

}

if ( ! function_exists('piquant_mikado_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function piquant_mikado_set_search_position_in_menu( $type ) {

		add_action( 'piquant_mikado_after_header_menu_area_html_open', 'piquant_mikado_load_search_template');

	}
}

if ( ! function_exists('piquant_mikado_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function piquant_mikado_set_search_position_mobile() {

		add_action( 'piquant_mikado_after_mobile_header_html_open', 'piquant_mikado_load_search_template');

	}

}

if ( ! function_exists('piquant_mikado_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function piquant_mikado_load_search_template() {
		global $mkdPiquantIconCollections;

		$search_type = piquant_mikado_options()->getOptionValue('search_type');

		$search_icon = '';
		$search_icon_close = '';
		if ( piquant_mikado_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $mkdPiquantIconCollections->getSearchIcon( piquant_mikado_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = $mkdPiquantIconCollections->getSearchClose( piquant_mikado_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> piquant_mikado_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		piquant_mikado_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}