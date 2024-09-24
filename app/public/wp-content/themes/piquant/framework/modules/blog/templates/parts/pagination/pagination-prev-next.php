<div class="mkdf-prev-next-pagination">
	<?php if(get_previous_posts_link('', $blog_query->max_num_pages)) : ?>
		<span class="mkdf-prev-posts-link">
			<?php previous_posts_link(piquant_mikado_icon_collections()->renderIcon('arrow_carrot-left', 'font_elegant').esc_html__('Newer Posts', 'piquant'), $blog_query->max_num_pages); ?>
		</span>
	<?php endif; ?>

	<?php if(get_next_posts_link('', $blog_query->max_num_pages)) : ?>
		<span class="mkdf-next-posts-link">
			<?php next_posts_link(esc_html__('Older Posts', 'piquant').piquant_mikado_icon_collections()->renderIcon('arrow_carrot-right', 'font_elegant'), $blog_query->max_num_pages); ?>
		</span>
	<?php endif; ?>
</div>