<<?php echo esc_attr($title_tag)?> class="clearfix mkdf-title-holder">
<span class="mkdf-accordion-mark mkdf-left-mark">
		<span class="mkdf-accordion-mark-icon">
			<span class="arrow_triangle-down"></span>
		</span>
	</span>
	<span class="mkdf-tab-title">
		<span class="mkdf-tab-title-inner">
			<?php echo esc_attr($title)?>
		</span>
	</span>
</<?php echo esc_attr($title_tag)?>>
<div class="mkdf-accordion-content">
	<div class="mkdf-accordion-content-inner">
		<?php echo do_shortcode($content)?>
	</div>
</div>
