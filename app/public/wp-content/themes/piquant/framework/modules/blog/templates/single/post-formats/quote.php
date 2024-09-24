<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkdf-post-content clearfix">
		<div class="mkdf-post-text">
			<div class="mkdf-post-text-inner">
				<div class="mkdf-post-mark">
					<?php echo piquant_mikado_icon_collections()->renderIcon('icon_quotations', 'font_elegant'); ?>
				</div>
				<div class="mkdf-quote-inner-content">
					<div class="mkdf-post-title-holder">
						<h4 class="mkdf-post-title"><?php echo esc_html(get_post_meta(get_the_ID(), 'mkdf_post_quote_text_meta', true)); ?></h4>
						<p class="mkdf-quote-author"><?php the_title(); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mkdf-quote-content">
		<div class="mkdf-post-info">
			<?php piquant_mikado_post_info($post_info_array); ?>
		</div>
		<?php the_content(); ?>
	</div>
	<div class="mkdf-share-icons">
		<?php $post_info_array['share'] = piquant_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
		<?php if ($post_info_array['share'] == 'yes'): ?>
			<span class="mkdf-share"><?php esc_html_e('Share', 'piquant'); ?></span>
			<?php echo piquant_mikado_get_social_share_html(array('type' => 'list', 'icon_type' => 'circle')); ?>
		<?php endif; ?>

	</div>
</article>