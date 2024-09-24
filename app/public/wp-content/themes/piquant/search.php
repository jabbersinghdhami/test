<?php
$sidebar = piquant_mikado_sidebar_layout();
$excerpt_length_array = piquant_mikado_blog_lists_number_of_chars();
$excerpt_length = $excerpt_length_array['standard'];
?>
<?php get_header(); ?>
<?php get_template_part( 'title' ); ?>
	<div class="mkdf-container">
		<?php do_action('piquant_mikado_after_container_open'); ?>
		<div class="mkdf-container-inner clearfix">
			<div class="mkdf-container">
				<?php do_action('piquant_mikado_after_container_open'); ?>
				<div class="mkdf-container-inner" >
					<div class="mkdf-blog-holder mkdf-blog-type-standard-date-on-side">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
						<div class="mkdf-post-content clearfix">
							<div class="mkdf-post-text">
								<div class="mkdf-post-text-inner">
									<h2>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h2>
									<?php
									if(get_post_type() === 'post') {
										piquant_mikado_excerpt($excerpt_length);
									}
									?>
								</div>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php
						if(piquant_mikado_options()->getOptionValue('pagination') == 'yes') {
							piquant_mikado_get_blog_pagination_template();
						}
					?>
					<?php else: ?>
					<div class="entry">
						<p><?php esc_html_e('No posts were found.', 'piquant'); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<?php do_action('piquant_mikado_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('piquant_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>