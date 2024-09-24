<?php

if ( ! function_exists('piquant_mikado_like') ) {
	/**
	 * Returns MikadofPiquantLike instance
	 *
	 * @return MikadofPiquantLike
	 */
	function piquant_mikado_like() {
		return MikadofPiquantLike::get_instance();
	}

}

function piquant_mikado_get_like() {

	echo wp_kses(piquant_mikado_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('piquant_mikado_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function piquant_mikado_like_latest_posts() {
		return piquant_mikado_like()->add_like();
	}

}

if ( ! function_exists('piquant_mikado_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function piquant_mikado_like_portfolio_list($portfolio_project_id) {
		return piquant_mikado_like()->add_like_portfolio_list($portfolio_project_id);
	}
}

if ( ! function_exists('piquant_mikado_like_portfolio_single') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function piquant_mikado_like_portfolio_single() {
		return piquant_mikado_like()->add_like_portfolio_single();
	}
}