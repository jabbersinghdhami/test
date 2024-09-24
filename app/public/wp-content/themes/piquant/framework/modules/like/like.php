<?php

class MikadofPiquantLike {

	private static $instance;

	private function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_ajax_mkdf_like', array($this, 'ajax'));
		add_action('wp_ajax_nopriv_mkdf_like', array($this, 'ajax'));
	}

	public static function get_instance() {

		if(null == self::$instance) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	function enqueue_scripts() {

		wp_enqueue_script('mkdf-piquant-like', MIKADO_ASSETS_ROOT.'/js/like.min.js', 'jquery', '1.0', true);

		wp_localize_script('mkdf-piquant-like', 'mkdfLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}

	function ajax() {

		//update
		if(isset($_POST['likes_id'])) {

			$post_id = str_replace('mkdf-like-', '', $_POST['likes_id']);
			$type    = isset($_POST['type']) ? $_POST['type'] : '';

			echo wp_kses($this->like_post($post_id, 'update', $type), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'i'    => array(
					'class' => true,
					'style' => true,
					'id'    => true
				)
			));
		} //get
		else {
			$post_id = str_replace('mkdf-like-', '', $_POST['likes_id']);
			echo wp_kses($this->like_post($post_id, 'get'), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'i'    => array(
					'class' => true,
					'style' => true,
					'id'    => true
				)
			));
		}
		exit;
	}

	public function like_post($post_id, $action = 'get', $type = '') {
		if(!is_numeric($post_id)) {
			return;
		}

		switch($action) {

			case 'get':
				$like_count = get_post_meta($post_id, '_mkd-like', true);

				if($type == 'portfolio-single' && $like_count !== '') {
					switch($like_count) {
						case '0':
							$like_count .= ' '.esc_html__('Likes', 'piquant');
							break;
						case '1':
							$like_count .= ' '.esc_html__('Like', 'piquant');
							break;
						default:
							$like_count .= ' '.esc_html__('Likes', 'piquant');
					}
				}

				if(isset($_COOKIE['mkdf-like_'.$post_id])) {
					$icon = piquant_mikado_icon_collections()->renderIcon('icon_heart', 'font_elegant', array(
						'icon_attributes' => array(
							'class' => 'mkdf-like-icon-elem'
						)
					));
				} else {
					$icon = piquant_mikado_icon_collections()->renderIcon('icon_heart_alt', 'font_elegant', array(
						'icon_attributes' => array(
							'class' => 'mkdf-like-icon-elem'
						)
					));
				}
				if(!$like_count) {
					$like_count = 0;

					add_post_meta($post_id, '_mkd-like', $like_count, true);

					if($type == 'portfolio-single') {
						$like_count .= ' '.esc_html__('Likes', 'piquant');
					}
					$icon = piquant_mikado_icon_collections()->renderIcon('icon_heart_alt', 'font_elegant', array(
						'icon_attributes' => array(
							'class' => 'mkdf-like-icon-elem'
						)
					));
				}
				$return_value = $icon."<span>".$like_count."</span>";

				return $return_value;
				break;

			case 'update':
				$like_count = get_post_meta($post_id, '_mkd-like', true);

				if($type != 'portfolio_list' && isset($_COOKIE['mkdf-like_'.$post_id])) {
					return $like_count;
				}

				$like_count++;

				update_post_meta($post_id, '_mkd-like', $like_count);
				setcookie('mkdf-like_'.$post_id, $post_id, time() * 20, '/');

				if($type == 'portfolio-single' && $like_count !== '') {
					switch($like_count) {
						case '0':
							$like_count .= ' '.esc_html__('Likes', 'piquant');
							break;
						case '1':
							$like_count .= ' '.esc_html__('Like', 'piquant');
							break;
						default:
							$like_count .= ' '.esc_html__('Likes', 'piquant');
					}
				}

				if($type != 'portfolio_list') {
					$return_value = piquant_mikado_icon_collections()->renderIcon('icon_heart', 'font_elegant', array(
							'icon_attributes' => array(
								'class' => 'mkdf-like-icon-elem'
							)
						))."<span>".$like_count."</span>";

					$return_value .= '</span>';

					return $return_value;
				}

				return '';
				break;
			default:
				return '';
				break;
		}
	}

	public function add_like() {
		global $post;

		$output = $this->like_post($post->ID);

		$class = 'mkdf-like';
		$title = esc_html__('Like this', 'piquant');
		if(isset($_COOKIE['mkdf-like_'.$post->ID])) {
			$class = 'mkdf-like liked';
			$title = esc_html__('You already liked this!', 'piquant');
		}

		return '<a href="#" class="'.$class.'" id="mkdf-like-'.$post->ID.'" title="'.$title.'">'.$output.'</a>';
	}

	public function add_like_portfolio_list($portfolio_project_id) {

		$class = 'mkdf-like';
		$title = esc_html__('Like this', 'piquant');
		if(isset($_COOKIE['mkdf-like_'.$portfolio_project_id])) {
			$class = 'mkdf-like liked';
			$title = esc_html__('You already liked this!', 'piquant');
		}

		return '<a class="'.$class.'" data-type="portfolio_list" id="mkdf-like-'.$portfolio_project_id.'" title="'.$title.'"></a>';
	}

	public function add_like_portfolio_single() {
		global $post;

		$output = $this->like_post($post->ID, 'get', 'portfolio-single');

		$class = 'mkdf-like';
		$title = esc_html__('Like this', 'piquant');
		if(isset($_COOKIE['mkdf-like_'.$post->ID])) {
			$class = 'mkdf-like liked';
			$title = esc_html__('You already liked this!', 'piquant');
		}

		return '<a href="#" data-type="portfolio-single" class="'.$class.'" id="mkdf-like-'.$post->ID.'" title="'.$title.'">'.$output.'</a>';
	}

	public function add_like_blog_list($blog_id) {

		$class = 'mkdf-like';
		$title = esc_html__('Like this', 'piquant');
		if(isset($_COOKIE['mkdf-like_'.$blog_id])) {
			$class = 'mkdf-like liked';
			$title = esc_html__('You already liked this!', 'piquant');
		}

		return '<a class="hover_icon '.$class.'" data-type="portfolio_list" id="mkdf-like-'.$blog_id.'" title="'.$title.'"></a>';
	}

}

global $piquant_mikado_like;
$piquant_mikado_like = MikadofPiquantLike::get_instance();


function piquant_mikado_like_latest_posts() {
	global $piquant_mikado_like;

	return $piquant_mikado_like->add_like();
}