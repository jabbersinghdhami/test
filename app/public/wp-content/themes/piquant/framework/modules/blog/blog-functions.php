<?php
if(!function_exists('piquant_mikado_get_blog')) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function piquant_mikado_get_blog($type) {

		$sidebar = piquant_mikado_sidebar_layout();

		$params = array(
			'blog_type' => $type,
			'sidebar'   => $sidebar
		);
		piquant_mikado_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}

}

if(!function_exists('piquant_mikado_get_blog_type')) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function piquant_mikado_get_blog_type($type) {
		global $wp_query;

		$id          = piquant_mikado_get_page_id();
		$category    = get_post_meta($id, "mkdf_blog_category_meta", true);
		$post_number = esc_attr(get_post_meta($id, "mkdf_show_posts_per_page_meta", true));

		$paged = piquant_mikado_paged();

		if(!is_archive()) {
			$blog_query = new WP_Query('post_type=post&paged='.$paged.'&cat='.$category.'&posts_per_page='.$post_number);
		} else {
			$blog_query = $wp_query;
		}

		if(piquant_mikado_options()->getOptionValue('blog_page_range') != "") {
			$blog_page_range = esc_attr(piquant_mikado_options()->getOptionValue('blog_page_range'));
		} else {
			$blog_page_range = $blog_query->max_num_pages;
		}
		$params = array(
			'blog_query'      => $blog_query,
			'paged'           => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type'       => $type
		);

		piquant_mikado_get_module_template_part('templates/lists/'.$type, 'blog', '', $params);
	}
}

if(!function_exists('piquant_mikado_get_blog_pagination_template')) {
	function piquant_mikado_get_blog_pagination_template($blog_type = '', $blog_query = '', $blog_page_range = '', $paged = '', $default_pagination_type = 'prev-next') {
		global $wp_query;

		$pagination_type = '';
		switch($blog_type) {
			case 'standard':
			case 'standard-whole-post':
			case 'standard-featured':
			case 'stadard-date-on-side':
				$pagination_type = piquant_mikado_options()->getOptionValue('standard_pagination');
				break;
			case 'masonry':
			case 'masonry-full-width':
				$pagination_type = piquant_mikado_options()->getOptionValue('masonry_pagination');
				break;
			default:
				$pagination_type = $default_pagination_type;
				break;
		}

		$blog_query = !empty($blog_query) ? $blog_query : $wp_query;

		$params = array(
			'blog_type'       => $blog_type,
			'blog_query'      => $blog_query,
			'blog_page_range' => $blog_page_range,
			'paged'           => $paged,
			'pagination_type' => $pagination_type
		);

		piquant_mikado_get_module_template_part('templates/parts/pagination/pagination', 'blog', $pagination_type, $params);
	}
}

if(!function_exists('piquant_mikado_get_post_format_html')) {

	/**
	 * Function which return html for post formats
	 *
	 * @param $type
	 * @param $excerpt_length
	 *
	 * @return post hormat template
	 */

	function piquant_mikado_get_post_format_html($type = '', $excerpt_length = '') {

		$post_format = get_post_format();
		if($post_format === false) {
			$post_format = 'standard';
		} elseif(!in_array($post_format, array('link', 'quote', 'audio', 'gallery', 'video'))) {
			$post_format = 'standard';
		}
		$slug = '';
		if($type !== "") {
			$slug = $type;
		}

		$params = array();

		if($excerpt_length === '') {
			$chars_array = piquant_mikado_blog_lists_number_of_chars();
			if(isset($chars_array[$type])) {
				$excerpt_length = $chars_array[$type];
			} else {
				$excerpt_length = '';
			}
		}

		$params['excerpt_length'] = $excerpt_length;

		$post_info_array = array(
			'date'     => false,
			'comments' => false
		);

		if(in_array($type, array('standard', 'standard-whole-post'))) {
			$post_info_array['category'] = true;
			$post_info_array['author']   = true;
		}

		if(in_array($type, array('standard', 'standard-date-on-side'))) {
			$post_info_array['author']   = true;
			$post_info_array['category'] = true;
		}

		$post_info_array['like']  = piquant_mikado_options()->getOptionValue('enable_blog_like') == 'yes';

		$params['post_info_array'] = $post_info_array;
		$params['blog_type']       = $type;

		piquant_mikado_get_module_template_part('templates/lists/post-formats/'.$post_format, 'blog', $slug, $params);

	}

}

if(!function_exists('piquant_mikado_get_default_blog_list')) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function piquant_mikado_get_default_blog_list() {

		$blog_list = piquant_mikado_options()->getOptionValue('blog_list_type');

		return $blog_list;

	}

}


if(!function_exists('piquant_mikado_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function piquant_mikado_pagination($pages = '', $range = 4, $paged = 1) {

		$showitems = $range + 1;

		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
		if(1 != $pages) {

			echo '<div class="mkdf-pagination">';
			echo '<ul>';
			if($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
				echo '<li class="mkdf-pagination-first-page"><a href="'.esc_url(get_pagenum_link(1)).'"><<</a></li>';
			}
			echo "<li class='mkdf-pagination-prev";
			if($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
				echo " mkdf-pagination prev-first";
			}
			echo "'><a href='".esc_url(get_pagenum_link($paged - 1))."'><</a></li>";

			for($i = 1; $i <= $pages; $i++) {
				if(1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					echo ($paged == $i) ? "<li class='active'><span>".$i."</span></li>" : "<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
				}
			}

			echo '<li class="mkdf-pagination-next';
			if($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
				echo ' mkdf-pagination-next-last';
			}
			echo '"><a href="';
			if($pages > $paged) {
				echo esc_url(get_pagenum_link($paged + 1));
			} else {
				echo esc_url(get_pagenum_link($paged));
			}
			echo '">></a></li>';
			if($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
				echo '<li class="mkdf-pagination-last-page"><a href="'.esc_url(get_pagenum_link($pages)).'">>></a></li>';
			}
			echo '</ul>';
			echo "</div>";
		}
	}
}

if(!function_exists('piquant_mikado_post_info')) {
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 * @param $blog_type
	 */
	function piquant_mikado_post_info($config, $blog_type = '') {
		$default_config = array(
			'date'     => '',
			'category' => '',
			'author'   => '',
			'comments' => '',
			'like'     => '',
			'share'    => ''
		);

		extract(shortcode_atts($default_config, $config));
		$params['blog_type'] = $blog_type;

		if($date == 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/post-info-date', 'blog', '', $params);
		}

		if($author == 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/post-info-author', 'blog', '', $params);
		}

		if($like == 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/post-info-like', 'blog', '', $params);
		}

		if($category == 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/post-info-category', 'blog', '', $params);
		}

		if($comments == 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/post-info-comments', 'blog', '', $params);
		}

		if($share == 'yes') {
			piquant_mikado_get_module_template_part('templates/parts/post-info-share', 'blog', '', $params);
		}
	}
}

if(!function_exists('piquant_mikado_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in mkd_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function piquant_mikado_excerpt($excerpt_length) {
		global $post;

		if(post_password_required()) {
			echo get_the_password_form();
		} //does current post has read more tag set?
		elseif(piquant_mikado_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		} //is word count set to something different that 0?
		elseif($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = isset($excerpt_length) && $excerpt_length !== "" ? $excerpt_length : esc_attr(piquant_mikado_options()->getOptionValue('number_of_chars'));

			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode(' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice($excerpt_word_array, 0, $word_count);

				//add exerpt postfix
				$excert_postfix = apply_filters('piquant_mikado_excerpt_postfix', '...');

				//and finally implode words together
				$excerpt = implode(' ', $excerpt_word_array).$excert_postfix;

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p class="mkdf-post-excerpt">'.wp_kses_post($excerpt).'</p>';
				}
			}
		}
	}
}

if(!function_exists('piquant_mikado_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function piquant_mikado_get_blog_single() {
		$sidebar = piquant_mikado_sidebar_layout();

		$params = array(
			'sidebar' => $sidebar
		);

		piquant_mikado_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if(!function_exists('piquant_mikado_get_single_html')) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function piquant_mikado_get_single_html() {

		$post_format = get_post_format();
		if($post_format === false) {
			$post_format = 'standard';
		}

		$params = array();

		$post_info_array = array(
			'date'     => false,
			'comments' => false,
			'category' => true,
			'author'   => true,
			'share'    => false
		);

		$post_info_array['like']  = piquant_mikado_options()->getOptionValue('enable_blog_like') == 'yes';

		if(in_array($post_format, array('link', 'quote'))) {
			$post_info_array['date'] = true;
		}

		$params['post_info_array'] = $post_info_array;

		piquant_mikado_get_module_template_part('templates/single/post-formats/'.$post_format, 'blog', '', $params);
		piquant_mikado_get_module_template_part('templates/single/parts/single-navigation', 'blog');
		piquant_mikado_get_module_template_part('templates/single/parts/author-info', 'blog');
		if(piquant_mikado_show_comments()) {
			comments_template('', true);
		}
	}

}
if(!function_exists('piquant_mikado_additional_post_items')) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function piquant_mikado_additional_post_items() {

		if(has_tag() && piquant_mikado_options()->getOptionValue('blog_enable_single_tags') == 'yes') {
			piquant_mikado_get_module_template_part('templates/single/parts/tags', 'blog');
		}


		$args_pages = array(
			'before'      => '<div class="mkdf-single-links-pages"><div class="mkdf-single-links-pages-inner">',
			'after'       => '</div></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '%'
		);

		wp_link_pages($args_pages);

	}

	add_action('piquant_mikado_before_blog_article_closed_tag', 'piquant_mikado_additional_post_items');
}


if(!function_exists('piquant_mikado_comment')) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */

	function piquant_mikado_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment   = $post->post_author == $comment->user_id;

		$comment_class = 'mkdf-comment clearfix';

		if($is_author_comment) {
			$comment_class .= ' mkdf-post-author-comment';
		}

		if($is_pingback_comment) {
			$comment_class .= ' mkdf-pingback-comment';
		}

		?>

		<li>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="mkdf-comment-image"> <?php echo piquant_mikado_kses_img(get_avatar($comment, 75)); ?> </div>
			<?php } ?>
			<div class="mkdf-comment-text">
				<div class="mkdf-comment-info clearfix">
					<h6 class="mkdf-comment-name">
						<?php if($is_pingback_comment) {
							esc_html_e('Pingback:', 'piquant');
						} ?>
						<?php echo wp_kses_post(get_comment_author_link()); ?>
					</h6>
					<span class="mkdf-comment-date"><?php comment_time(get_option('date_format')); ?>, <?php comment_time(get_option('time_format')); ?></span>
				</div>
				<?php if(!$is_pingback_comment) { ?>
					<div class="mkdf-text-holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
					<div class="mkdf-comment-reply-holder">
						<?php
						comment_reply_link(array_merge($args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						)));
						edit_comment_link();
						?>
					</div>

				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>

		<?php
	}
}

if(!function_exists('piquant_mikado_blog_archive_pages_classes')) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function piquant_mikado_blog_archive_pages_classes($blog_type) {

		$classes = array();
		if(in_array($blog_type, piquant_mikado_blog_full_width_types())) {
			$classes['holder'] = 'full_width';
			$classes['inner']  = 'full_width_inner';
		} elseif(in_array($blog_type, piquant_mikado_blog_grid_types())) {
			$classes['holder'] = 'mkdf-container';
			$classes['inner']  = 'mkdf-container-inner clearfix';
		}

		return $classes;

	}

}

if(!function_exists('piquant_mikado_blog_full_width_types')) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function piquant_mikado_blog_full_width_types() {

		$types = array('masonry-full-width');

		return $types;

	}

}

if(!function_exists('piquant_mikado_blog_grid_types')) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function piquant_mikado_blog_grid_types() {

		$types = array('standard', 'masonry', 'standard-featured', 'standard-whole-post', 'standard-date-on-side');

		return $types;

	}

}

if(!function_exists('piquant_mikado_blog_types')) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function piquant_mikado_blog_types() {

		$types = array_merge(piquant_mikado_blog_grid_types(), piquant_mikado_blog_full_width_types());

		return $types;

	}

}

if(!function_exists('piquant_mikado_blog_templates')) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function piquant_mikado_blog_templates() {

		$templates      = array();
		$grid_templates = piquant_mikado_blog_grid_types();
		$full_templates = piquant_mikado_blog_full_width_types();
		foreach($grid_templates as $grid_template) {
			array_push($templates, 'blog-'.$grid_template);
		}
		foreach($full_templates as $full_template) {
			array_push($templates, 'blog-'.$full_template);
		}

		return $templates;

	}

}

if(!function_exists('piquant_mikado_blog_lists_number_of_chars')) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function piquant_mikado_blog_lists_number_of_chars() {

		$number_of_chars = array();
		if(piquant_mikado_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = piquant_mikado_options()->getOptionValue('standard_number_of_chars');
			$number_of_chars['standard-featured'] = piquant_mikado_options()->getOptionValue('standard_number_of_chars');
		}
		if(piquant_mikado_options()->getOptionValue('masonry_number_of_chars')) {
			$number_of_chars['masonry'] = piquant_mikado_options()->getOptionValue('masonry_number_of_chars');
		}

		return $number_of_chars;

	}

}

if(!function_exists('piquant_mikado_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 *
	 * @param $length int original value
	 *
	 * @return int changed value
	 */
	function piquant_mikado_excerpt_length($length) {

		if(piquant_mikado_options()->getOptionValue('number_of_chars') !== '') {
			return esc_attr(piquant_mikado_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter('excerpt_length', 'piquant_mikado_excerpt_length', 999);
}

if(!function_exists('piquant_mikado_excerpt_more')) {
	/**
	 * Function that adds three dotes on the end excerpt
	 *
	 * @param $more
	 *
	 * @return string
	 */
	function piquant_mikado_excerpt_more($more) {
		return '...';
	}

	add_filter('excerpt_more', 'piquant_mikado_excerpt_more');
}

if(!function_exists('piquant_mikado_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function piquant_mikado_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('piquant_mikado_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function piquant_mikado_post_has_title() {
		return get_the_title() !== '';
	}
}

if(!function_exists('piquant_mikado_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function piquant_mikado_modify_read_more_link() {
		$link = '<div class="mkdf-more-link-container">';
		$link .= piquant_mikado_get_button_html(array(
			'link'         => get_permalink().'#more-'.get_the_ID(),
			'text'         => esc_html__('Continue reading', 'piquant'),
			'size'         => 'small'
		));

		$link .= '</div>';

		return $link;
	}

	add_filter('the_content_more_link', 'piquant_mikado_modify_read_more_link');
}


if(!function_exists('piquant_mikado_has_blog_widget')) {
	/**
	 * Function that checks if latest posts widget is added to widget area
	 * @return bool
	 */
	function piquant_mikado_has_blog_widget() {
		$widgets_array = array(
			'mkd_latest_posts_widget'
		);

		foreach($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('piquant_mikado_has_blog_shortcode')) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function piquant_mikado_has_blog_shortcode() {
		$blog_shortcodes = array(
			'mkdf_blog_list',
			'mkdf_blog_slider',
			'mkdf_blog_carousel'
		);

		$slider_field = get_post_meta(piquant_mikado_get_page_id(), 'mkd_revolution-slider', true); //TODO change

		foreach($blog_shortcodes as $blog_shortcode) {
			$has_shortcode = piquant_mikado_has_shortcode($blog_shortcode) || piquant_mikado_has_shortcode($blog_shortcode, $slider_field);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}


if(!function_exists('piquant_mikado_load_blog_assets')) {
	/**
	 * Function that checks if blog assets should be loaded
	 *
	 * @see mkd_is_blog_template()
	 * @see is_home()
	 * @see is_single()
	 * @see mkd_has_blog_shortcode()
	 * @see is_archive()
	 * @see is_search()
	 * @see mkd_has_blog_widget()
	 * @return bool
	 */
	function piquant_mikado_load_blog_assets() {
		return piquant_mikado_is_blog_template() || is_home() || is_single() || piquant_mikado_has_blog_shortcode() || is_archive() || is_search() || piquant_mikado_has_blog_widget();
	}
}

if(!function_exists('piquant_mikado_is_blog_template')) {
	/**
	 * Checks if current template page is blog template page.
	 *
	 * @param string current page. Optional parameter.
	 *
	 * @return bool
	 *
	 * @see piquant_mikado_get_page_template_name()
	 */
	function piquant_mikado_is_blog_template($current_page = '') {

		if($current_page == '') {
			$current_page = piquant_mikado_get_page_template_name();
		}

		$blog_templates = piquant_mikado_blog_templates();

		return in_array($current_page, $blog_templates);
	}
}

if(!function_exists('piquant_mikado_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function piquant_mikado_read_more_button($option = '', $class = '') {
		if($option != '') {
			$show_read_more_button = piquant_mikado_options()->getOptionValue($option) == 'yes';
		} else {
			$show_read_more_button = 'yes';
		}
		if($show_read_more_button && !piquant_mikado_post_has_read_more() && !post_password_required()) {
			echo piquant_mikado_get_button_html(array(
				'size'         => 'medium',
				'link'         => get_the_permalink(),
				'text'         => esc_html__('Read More', 'piquant'),
				'custom_class' => $class,
				'icon_pack'    => 'font_elegant',
				'fe_icon'      => 'arrow_right',
				'custom_class' => 'mkdf-btn-read-more'
			));
		}
	}
}

if(!function_exists('piquant_mikado_add_user_custom_fields')) {
	/**
	 * Function creates custom social fields for users
	 *
	 * return $user_contact
	 */
	function piquant_mikado_add_user_custom_fields($user_contact) {

		/**
		 * Function that add custom user fields
		 **/
		$user_contact['instagram']   = esc_html__('Instagram', 'piquant');
		$user_contact['twitter']     = esc_html__('Twitter', 'piquant');
		$user_contact['pintarest']   = esc_html__('Pinterest', 'piquant');
		$user_contact['tumblr']      = esc_html__('Tumbrl', 'piquant');
		$user_contact['facebook']    = esc_html__('Facebook', 'piquant');
		$user_contact['google_plus'] = esc_html__('Google Plus', 'piquant');
		$user_contact['linkedin']    = esc_html__('Linkedin', 'piquant');

		return $user_contact;
	}
}

add_filter('user_contactmethods', 'piquant_mikado_add_user_custom_fields');

if(!function_exists('piquant_mikado_get_user_custom_fields')) {
	/**
	 * Function returns links and icons for author social networks
	 *
	 * return array
	 */
	function piquant_mikado_get_user_custom_fields() {

		$user_social_array    = array();
		$social_network_array = array(
			'instagram',
			'twitter',
			'pintarest',
			'tumblr',
			'facebook',
			'google_plus',
			'linkedin'
		);

		foreach($social_network_array as $network) {
			if(get_the_author_meta($network) != '') {
				$$network                    = array(
					'link'  => get_the_author_meta($network),
					'class' => 'icon-social-'.$network
				);
				$user_social_array[$network] = $$network;
			}
		}

		return $user_social_array;
	}
}

?>