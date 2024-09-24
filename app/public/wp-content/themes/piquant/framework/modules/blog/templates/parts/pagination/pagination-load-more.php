<?php
if(get_next_posts_page_link($blog_query->max_num_pages)) { ?>
	<div class="mkdf-blog-<?php echo esc_attr($pagination_type); ?>-button-holder mkdf-load-more-btn-holder">
		<span class="mkdf-blog-<?php echo esc_attr($pagination_type); ?>-button" data-rel="<?php echo esc_attr($blog_query->max_num_pages); ?>">
			<a class="mkdf-load-more-btn" href="<?php echo esc_url(get_next_posts_page_link($blog_query->max_num_pages)); ?>">
				<span class="mkdf-load-more-icon">
					<?php echo piquant_mikado_icon_collections()->renderIcon('arrow_down', 'font_elegant'); ?>
				</span>
				<span><?php esc_html_e('See More', 'piquant'); ?></span>
			</a>
		</span>
		<div class="mkdf-pulse-loader-holder">
			<div class="mkdf-pulse-loader"></div>
		</div>

	</div>
<?php } ?>