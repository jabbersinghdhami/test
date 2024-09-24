<?php
/*
Template Name: Blog: Masonry
*/
?>
<?php get_header(); ?>
<?php get_template_part( 'title' ); ?>
<?php get_template_part('slider'); ?>
	<div class="mkdf-container">
		<?php do_action('piquant_mikado_after_container_open'); ?>
		<div class="mkdf-container-inner">
			<?php piquant_mikado_get_blog('masonry'); ?>
		</div>
		<?php do_action('piquant_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>