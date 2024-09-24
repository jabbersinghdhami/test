<?php

if(!function_exists('piquant_mikado_restaurant_assets')) {
	/**
	 * Includes all scripts and styles for restaurant plugin
	 */
	function piquant_mikado_restaurant_assets() {
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('mkdf-piquant-restaurant', MIKADO_ASSETS_ROOT.'/js/restaurant.min.js', array('jquery'), true, true);

		wp_enqueue_style('mkdf-piquant-restaurant', MIKADO_ASSETS_ROOT.'/css/restaurant/restaurant.min.css');

		if(piquant_mikado_is_responsive_on()) {
			wp_enqueue_style('mkdf-piquant-restaurant-responsive', MIKADO_ASSETS_ROOT.'/css/restaurant/restaurant-responsive.min.css');
		}
	}

	add_action('wp_enqueue_scripts', 'piquant_mikado_restaurant_assets');
}

if(!function_exists('piquant_mikado_restaurant_get_menu_item_single')) {
	/**
	 * Loads menu item single template
	 */
	function piquant_mikado_restaurant_get_menu_item_single() {
		piquant_mikado_get_module_template_part('templates/single', 'restaurant', '', array());
	}
}

if(!function_exists('piquant_mikado_restaurant_get_menu_item_prep_info')) {
	/**
	 * Loads menu item preparation info template part
	 */
	function piquant_mikado_restaurant_get_menu_item_prep_info() {
		if(piquant_mikado_options()->getOptionValue('menu_item_show_preparation_info') === 'yes') {
			$params = array(
				'meta' => array(
					'price'        => get_post_meta(get_the_ID(), 'mkdf_menu_item_price_meta', true),
					'prep_time'    => get_post_meta(get_the_ID(), 'mkdf_menu_item_prep_time_meta', true),
					'cook_time'    => get_post_meta(get_the_ID(), 'mkdf_menu_item_cook_time_meta', true),
					'servings_num' => get_post_meta(get_the_ID(), 'mkdf_menu_item_servings_num_meta', true),
					'calories_num' => get_post_meta(get_the_ID(), 'mkdf_menu_item_calories_num_meta', true),
					'ready_in'     => get_post_meta(get_the_ID(), 'mkdf_menu_item_ready_in_meta', true)
				)
			);

			piquant_mikado_get_module_template_part('templates/parts/prep-info', 'restaurant', '', $params);
		}
	}
}

if(!function_exists('piquant_mikado_restaurant_get_menu_item_ingredients')) {
	/**
	 * Loads menu item's ingredients template part
	 */
	function piquant_mikado_restaurant_get_menu_item_ingredients() {
		$ingredients_text = get_post_meta(get_the_ID(), 'mkdf_menu_item_ingredients_meta', true);

		if($ingredients_text !== '') {
			$ingredients_list = explode("\r\n", $ingredients_text);
		}

		$params = array(
			'ingredients' => $ingredients_list
		);

		piquant_mikado_get_module_template_part('templates/parts/ingredients', 'restaurant', '', $params);
	}
}

if(!function_exists('piquant_mikado_restaurant_get_menu_item_related')) {
	/**
	 * Loads menu item's related items
	 */
	function piquant_mikado_restaurant_get_menu_item_related() {
		if(piquant_mikado_options()->getOptionValue('menu_item_show_related') === 'yes') {
			$related_posts = piquant_mikado_get_related_post_type(get_the_ID(), array(
				'posts_per_page' => 4
			));

			$image_size = piquant_mikado_options()->getOptionValue('menu_item_related_image_size');

			$params = array(
				'related_posts' => $related_posts,
				'image_size'    => $image_size
			);

			piquant_mikado_get_module_template_part('templates/parts/related-posts', 'restaurant', '', $params);
		}
	}
}

if(!function_exists('piquant_mikado_restaurant_get_menu_item_gallery')) {
	/**
	 * Loads menu item's gallery template part
	 */
	function piquant_mikado_restaurant_get_menu_item_gallery() {
		$images_ids = get_post_meta(get_the_ID(), 'mkdf_menu_item_gallery_meta', true);
		$params     = array();

		if(!empty($images_ids)) {
			$images_ids = explode(',', $images_ids);
		}

		$params['images_ids'] = $images_ids;

		piquant_mikado_get_module_template_part('templates/parts/gallery', 'restaurant', '', $params);
	}
}

if(!function_exists('piquant_mikado_restaurant_get_comments')) {
	/**
	 * Loads comments template
	 */
	function piquant_mikado_restaurant_get_comments() {
		if(piquant_mikado_options()->getOptionValue('menu_item_enable_comments') === 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/comments', 'restaurant');
		}
	}
}

if(!function_exists('piquant_mikado_restaurant_get_share')) {
	/**
	 * Loads social share template for single menu item page if enabled
	 */
	function piquant_mikado_restaurant_get_share() {
		$share_enabled = piquant_mikado_options()->getOptionValue('enable_social_share') === 'yes'
		                 && piquant_mikado_options()->getOptionValue('enable_social_share_on_restaurant-menu-item') === 'yes';

		if($share_enabled) {
			piquant_mikado_get_module_template_part('templates/parts/share', 'restaurant', '', array());
		}
	}
}

if(!function_exists('piquant_mikado_restaurant_get_single_nav')) {
	/**
	 * Loads prev / next pagination for single menu item
	 */
	function piquant_mikado_restaurant_get_single_nav() {
		if(piquant_mikado_options()->getOptionValue('menu_item_show_navigation') === 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/navigation', 'restaurant', '', array());
		}
	}
}

if(!function_exists('piquant_mikado_restaurant_get_single_author_info')) {
	/**
	 * Loads author info template if enabled
	 */
	function piquant_mikado_restaurant_get_single_author_info() {
		if(piquant_mikado_options()->getOptionValue('menu_item_show_author_info') === 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/author-info', 'restaurant', '', array());
		}
	}
}