<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkdf-post-content">
		<?php piquant_mikado_get_module_template_part('templates/single/parts/gallery', 'blog'); ?>
		<div class="mkdf-post-text">
			<div class="mkdf-date-format">
				<span class="mkdf-day"><?php the_time('j') ?></span>
				<span class="mkdf-month"><?php the_time('M') ?></span>
			</div>
			<div class="mkdf-post-text-inner clearfix">
				<?php piquant_mikado_get_module_template_part('templates/single/parts/title', 'blog'); ?>
				<div class="mkdf-post-info">
					<?php piquant_mikado_post_info($post_info_array) ?>
				</div>
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<div class="mkdf-share-icons">
		<?php $post_info_array['share'] = piquant_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
		<?php if ($post_info_array['share'] == 'yes'):?>
			<span class="mkdf-share"><?php esc_html_e('Share', 'piquant'); ?></span>
			<?php echo piquant_mikado_get_social_share_html(array('type' => 'list', 'icon_type' => 'circle')); ?>
		<?php endif; ?>
	</div>
	<?php do_action('piquant_mikado_before_blog_article_closed_tag'); ?>
</article>