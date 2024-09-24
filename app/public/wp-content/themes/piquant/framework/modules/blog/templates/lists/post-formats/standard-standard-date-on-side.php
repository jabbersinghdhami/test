	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkdf-post-content">
		<?php piquant_mikado_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
		<div class="mkdf-date-format">
			<?php if(!piquant_mikado_post_has_title()) : ?>
				<a href="<?php esc_url(the_permalink()); ?>">
			<?php endif; ?>

			<span class="mkdf-day"><?php the_time('j') ?></span>
			<span class="mkdf-month"><?php the_time('M') ?></span>

			<?php if(!piquant_mikado_post_has_title()) : ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="mkdf-post-text clearfix">
			<div class="mkdf-post-text-inner">
				<?php piquant_mikado_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<div class="mkdf-post-info">
					<?php piquant_mikado_post_info($post_info_array, $blog_type); ?>
				</div>
				<?php piquant_mikado_excerpt($excerpt_length);?>
			</div>
			<div class="mkdf-share-icons">
				<?php $post_info_array['share'] = piquant_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
				<?php if ($post_info_array['share'] == 'yes'): ?>
				<span class="mkdf-share"><?php esc_html_e('Share', 'piquant'); ?></span>
				<?php endif; ?>
				<?php echo piquant_mikado_get_social_share_html(array('type' => 'list', 'icon_type' => 'circle')); ?>
			</div>
		</div>
	</div>
</article>