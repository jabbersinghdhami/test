<?php get_header(); ?>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<?php get_template_part('title'); ?>
		<?php get_template_part('slider'); ?>
		<div class="mkdf-container">
			<?php do_action('piquant_mikado_after_container_open'); ?>
			<div class="mkdf-container-inner">
				<?php piquant_mikado_restaurant_get_menu_item_single(); ?>
			</div>
			<?php do_action('piquant_mikado_before_container_close'); ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
