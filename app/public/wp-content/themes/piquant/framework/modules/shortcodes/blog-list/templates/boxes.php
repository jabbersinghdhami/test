<li <?php post_class('mkdf-blog-list-item clearfix'); ?>>
	<div class="mkdf-blog-list-item-inner">
		<div class="mkdf-item-image">
			<a href="<?php esc_url(the_permalink()); ?>">
				<?php
				echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>
				<span class="mkdf-boxes-overlay"></span>
			</a>
		</div>
		<div class="mkdf-item-text-holder">
			<div class="mkdf-item-info-section clearfix">
				<?php piquant_mikado_post_info(array(
					'date' => 'yes'
				)) ?>
			</div>
			<<?php echo esc_html($title_tag) ?> class="mkdf-item-title">
			<a href="<?php echo esc_url(get_permalink()) ?>">
				<?php echo esc_attr(get_the_title()) ?>
			</a>
		</<?php echo esc_html($title_tag) ?>>


		<?php if($text_length != '0') {
			$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
			<p class="mkdf-excerpt"><?php echo esc_html($excerpt) ?>...</p>
		<?php } ?>
	</div>
	</div>
</li>