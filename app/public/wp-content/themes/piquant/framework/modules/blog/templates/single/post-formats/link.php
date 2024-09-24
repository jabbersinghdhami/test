<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $post_link = get_post_meta(get_the_ID(), 'mkdf_post_link_link_meta', true); ?>

	<?php if($post_link !== '') : ?>
	<a target="_blank" href="<?php echo esc_url($post_link); ?>">
		<?php endif; ?>
		<div class="mkdf-post-content clearfix">
			<div class="mkdf-post-text">
				<div class="mkdf-post-text-inner">
					<div class="mkdf-post-mark">
						<?php echo piquant_mikado_icon_collections()->renderIcon('icon-link', 'simple_line_icons'); ?>
					</div>
					<h4 class="mkdf-post-title"><?php the_title(); ?></h4>
				</div>
			</div>
		</div>
		<?php if($post_link !== '') : ?>
	</a>
<?php endif; ?>

	<div class="mkdf-content-info">
		<div class="mkdf-post-info">
			<?php piquant_mikado_post_info($post_info_array); ?>
		</div>
		<?php the_content(); ?>
	</div>
	<div class="mkdf-share-icons">
		<?php $post_info_array['share'] = piquant_mikado_options()->getOptionValue('enable_social_share') == 'yes'; ?>
		<?php if ($post_info_array['share'] == 'yes'):?>
			<span class="mkdf-share"><?php esc_html_e('Share', 'piquant'); ?></span>
			<?php echo piquant_mikado_get_social_share_html(array('type' => 'list', 'icon_type' => 'circle')); ?>
		<?php endif; ?>

	</div>
</article>