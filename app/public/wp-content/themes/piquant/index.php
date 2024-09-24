<?php
$blog_archive_pages_classes = piquant_mikado_blog_archive_pages_classes(piquant_mikado_get_default_blog_list());
?>
<?php get_header(); ?>
<?php get_template_part( 'title' ); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
		<?php do_action('piquant_mikado_after_container_open'); ?>
		<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
			<?php piquant_mikado_get_blog(piquant_mikado_get_default_blog_list()); ?>
		</div>
		<?php do_action('piquant_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>