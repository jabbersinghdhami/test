<?php $sidebar = piquant_mikado_sidebar_layout(); ?>
<?php get_header(); ?>
	<?php get_template_part( 'title' ); ?>
	<?php get_template_part('slider'); ?>
	<div class="mkdf-container">
		<?php do_action('piquant_mikado_after_container_open'); ?>
		<div class="mkdf-container-inner clearfix">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
					<?php the_content(); ?>
					<?php do_action('piquant_mikado_page_after_content'); ?>
				<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
					<div <?php echo piquant_mikado_sidebar_columns_class(); ?>>
						<div class="mkdf-column1 mkdf-content-left-from-sidebar">
							<div class="mkdf-column-inner">
								<?php the_content(); ?>
								<?php do_action('piquant_mikado_page_after_content'); ?>
							</div>
						</div>
						<div class="mkdf-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
					<div <?php echo piquant_mikado_sidebar_columns_class(); ?>>
						<div class="mkdf-column1">
							<?php get_sidebar(); ?>
						</div>
						<div class="mkdf-column2 mkdf-content-right-from-sidebar">
							<div class="mkdf-column-inner">
								<?php the_content(); ?>
								<?php do_action('piquant_mikado_page_after_content'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php do_action('piquant_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>