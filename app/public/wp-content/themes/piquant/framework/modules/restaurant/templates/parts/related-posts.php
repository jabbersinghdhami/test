<?php if($related_posts->have_posts()) : ?>
	<div class="mkdf-smi-related-items">
		<h3><?php esc_html_e('You might also like', 'piquant'); ?></h3>

		<div class="mkdf-smi-related-items-content">
			<ul class="mkdf-smi-related-list">
				<?php while($related_posts->have_posts()) : $related_posts->the_post(); ?>
					<li <?php post_class('clearfix'); ?>>
						<div class="mkdf-smi-related-image-holder">
							<a href="<?php esc_url(the_permalink()); ?>">
								<?php the_post_thumbnail($image_size); ?>
							</a>
						</div>
						<div class="mkdf-smi-related-content-holder">
							<h5>
								<a href="<?php esc_url(the_permalink()); ?>">
									<?php esc_html(the_title()); ?>
								</a>
							</h5>
							<span class="mkdf-smi-related-post-date"><?php the_time('M d, Y'); ?></span>
						</div>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
<?php endif; ?>