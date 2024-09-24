<?php if(piquant_mikado_options()->getOptionValue('blog_single_navigation') == 'yes'){ ?>
	<?php $navigation_blog_through_category = piquant_mikado_options()->getOptionValue('blog_navigation_through_same_category') ?>
	<div class="mkdf-blog-single-navigation">
		<div class="mkdf-blog-single-navigation-inner">
			<?php if(get_previous_post() != ""){ ?>
				<div class="mkdf-blog-single-prev">
					<?php
					if($navigation_blog_through_category == 'yes'){
						previous_post_link('%link','<i class="icon-arrow-left icons"></i>', true,'','category');
					} else {
						previous_post_link('%link','<i class="icon-arrow-left icons"></i>');
					}
					?>
				</div> <!-- close div.blog_prev -->
			<?php } ?>
			<?php if(get_next_post() != ""){ ?>
				<div class="mkdf-blog-single-next">
					<?php
					if($navigation_blog_through_category == 'yes'){
						next_post_link('%link','<i class="icon-arrow-right icons"></i>', true,'','category');
					} else {
						next_post_link('%link','<i class="icon-arrow-right icons"></i>');
					}
					?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>