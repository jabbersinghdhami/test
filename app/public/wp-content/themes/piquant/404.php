<?php get_header(); ?>

	<?php get_template_part( 'title' ); ?>

	<div class="mkdf-container">
	<?php do_action('piquant_mikado_after_container_open'); ?>
		<div class="mkdf-container-inner mkdf-404-page">
			<div class="mkdf-page-not-found">
				<h2>
					<?php if(piquant_mikado_options()->getOptionValue('404_title')){
						echo esc_html(piquant_mikado_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page you are looking is not found', 'piquant');
					} ?>
				</h2>
				<h4>
					<?php if(piquant_mikado_options()->getOptionValue('404_text')){
						echo esc_html(piquant_mikado_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'piquant');
					} ?>
				</h4>
				<?php
					$params = array();
					if (piquant_mikado_options()->getOptionValue('404_back_to_home')){
						$params['text'] = piquant_mikado_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = "Back to Home Page";
					}
					$params['link'] = esc_url(home_url('/'));
					$params['target'] = '_self';
				echo piquant_mikado_execute_shortcode('mkdf_button',$params);?>
			</div>
		</div>
		<?php do_action('piquant_mikado_before_container_close'); ?>
	</div>
<?php get_footer(); ?>