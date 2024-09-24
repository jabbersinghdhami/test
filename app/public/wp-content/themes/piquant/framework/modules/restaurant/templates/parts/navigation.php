<div class="mkdf-smi-navigation-holder clearfix">
	<?php if(get_previous_post_link()) : ?>
		<div class="mkdf-smi-prev-post">
			<?php previous_post_link('%link', piquant_mikado_icon_collections()->renderIcon('arrow_carrot-left', 'font_elegant').' '.esc_html__('Previous Menu Item', 'piquant')); ?>
		</div>
	<?php endif; ?>
	<?php if(get_next_post_link()) : ?>
		<div class="mkdf-smi-next-post">
			<?php next_post_link('%link', esc_html__('Next Menu Item', 'piquant').' '.piquant_mikado_icon_collections()->renderIcon('arrow_carrot-right', 'font_elegant')); ?>
		</div>
	<?php endif; ?>
</div>