<div class="mkdf-smi-gallery-holder">
	<?php if(is_array($images_ids) && count($images_ids)) : ?>
		<div class="mkdf-smi-gallery mkdf-owl-slider">
			<?php foreach($images_ids as $image_id) : ?>
				<div class="mkdf-smi-gallery-item">
					<a href="<?php echo wp_get_attachment_url($image_id); ?>" data-rel="prettyPhoto[smiGallery<?php echo esc_attr(get_the_ID()); ?>]">
						<?php echo wp_get_attachment_image($image_id, 'full'); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	<?php elseif(has_post_thumbnail()) : ?>
		<a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" data-rel="prettyPhoto[smiGallery<?php echo esc_attr(get_the_ID()); ?>]">
			<?php the_post_thumbnail('full'); ?>
		</a>
	<?php endif; ?>
</div> <!-- close .mkdf-smi-gallery-holder -->