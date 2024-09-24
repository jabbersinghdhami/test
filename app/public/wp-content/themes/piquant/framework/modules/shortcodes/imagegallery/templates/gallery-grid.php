<div class="mkdf-image-gallery">
	<div class="mkdf-image-gallery-grid clearfix <?php echo esc_html($columns); ?> <?php echo esc_html($gallery_classes); ?>" >
		<?php foreach ($images as $image) { ?>
			<div class="mkdf-gallery-image">
				<?php if ($pretty_photo) { ?>
				<a href="<?php echo esc_url(wp_get_attachment_url($image['image_id']))?>" data-rel="prettyPhoto[single_pretty_photo]"></a>
					<?php } ?>

					<?php if(is_array($image_size) && count($image_size)) : ?>
						<?php echo piquant_mikado_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
					<?php else: ?>
						<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
					<?php endif; ?>

					<?php if($params['info_on_hover']=='yes') { ?>
						<h3 class="mkdf-image-title">
							<?php echo esc_attr($image['title']); ?>
						</h3>
					<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>