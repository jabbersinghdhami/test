<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mkdf-post-content">
		<div class="mkdf-audio-image-holder">
			<?php piquant_mikado_get_module_template_part('templates/lists/parts/image', 'blog'); ?>

			<?php if(has_post_thumbnail()) : ?>
				<div class="mkdf-audio-player-holder">
					<?php piquant_mikado_get_module_template_part('templates/parts/audio', 'blog'); ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if(!has_post_thumbnail()) : ?>
			<?php piquant_mikado_get_module_template_part('templates/parts/audio', 'blog'); ?>
		<?php endif; ?>
		<div class="mkdf-post-text">
			<div class="mkdf-post-text-inner">
				<div class="mkdf-post-info">
					<?php piquant_mikado_post_info($post_info_array, $blog_type); ?>
				</div>
				<?php piquant_mikado_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php
					piquant_mikado_excerpt($excerpt_length);
					piquant_mikado_read_more_button();
				?>
			</div>
		</div>
	</div>
</article>