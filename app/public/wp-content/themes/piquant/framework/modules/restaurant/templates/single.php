<div class="mkdf-single-menu-item-holder">
	<div class="mkdf-two-columns-66-33 clearfix">
		<div class="mkdf-column1">
			<div class="mkdf-column-inner">
				<div class="mkdf-smi-content-top">
					<?php piquant_mikado_restaurant_get_menu_item_gallery(); ?>
					<div class="mkdf-smi-content-holder">
						<?php the_content();#  ?>
					</div>

					<?php piquant_mikado_restaurant_get_share(); ?>
				</div>
				<?php piquant_mikado_restaurant_get_single_nav(); ?>
				<?php piquant_mikado_restaurant_get_single_author_info(); ?>
				<?php piquant_mikado_restaurant_get_comments(); ?>
			</div>
		</div>
		<div class="mkdf-column2">
			<div class="mkdf-column-inner">
				<div class="mkdf-smi-sidebar-item">
					<div class="mkdf-smi-title-holder">
						<h3><?php esc_html(the_title()); ?></h3>
					</div>
					<div class="mkdf-smi-excerpt-holder">
						<?php the_excerpt(); ?>
					</div>
				</div>
				<div class="mkdf-smi-sidebar-item">
					<?php piquant_mikado_restaurant_get_menu_item_prep_info(); ?>
				</div>
				<div class="mkdf-smi-sidebar-item">
					<?php piquant_mikado_restaurant_get_menu_item_ingredients(); ?>
				</div>
				<div class="mkdf-smi-sidebar-item">
					<?php piquant_mikado_restaurant_get_menu_item_related(); ?>
				</div>
			</div>
		</div>
	</div>
</div>