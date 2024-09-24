<div class="mkdf-image-gallery">
	<div class="mkdf-image-gallery-slider" <?php echo piquant_mikado_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) {
			if ($pretty_photo) { ?>
				<a href="<?php echo esc_url(wp_get_attachment_url($image['image_id']))?>" data-rel="prettyPhoto[single_pretty_photo]">
			<?php } ?>
			<?php echo piquant_mikado_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
			<?php if ($pretty_photo) { ?>
				</a>
			<?php }
		} ?>
	</div>
</div>