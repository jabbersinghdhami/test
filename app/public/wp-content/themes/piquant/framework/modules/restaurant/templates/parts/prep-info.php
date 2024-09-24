<?php if(is_array($meta) && count($meta)) : ?>
	<?php extract($meta); ?>
	<div class="mkdf-smi-prep-info-holder">
		<div class="mkdf-smi-prep-info-top">
			<div class="mkdf-prep-info-row clearfix">
				<div class="mkdf-prep-info-column">
					<?php if(!empty($prep_time)) : ?>
						<span class="mkdf-prep-info-icon">
							<?php echo piquant_mikado_icon_collections()->renderIcon('icon-hourglass', 'simple_line_icons'); ?>
						</span>
						<span class="mkdf-prep-info-label"><?php esc_html_e('PREP', 'piquant'); ?> <?php echo esc_html($prep_time); ?></span>
					<?php endif; ?>
				</div>
				<div class="mkdf-prep-info-column">
					<?php if(!empty($cook_time)) : ?>
						<span class="mkdf-prep-info-icon">
							<?php echo piquant_mikado_icon_collections()->renderIcon('icon-fire', 'simple_line_icons'); ?>
						</span>
						<span class="mkdf-prep-info-label"><?php esc_html_e('COOK', 'piquant'); ?> <?php echo esc_html($cook_time); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="mkdf-prep-info-row clearfix">
				<div class="mkdf-prep-info-column">
					<?php if(!empty($servings_num)) : ?>
						<span class="mkdf-prep-info-icon">
							<?php echo piquant_mikado_icon_collections()->renderIcon('icon-fire', 'simple_line_icons'); ?>
						</span>
						<span class="mkdf-prep-info-label"><?php echo esc_html($servings_num); ?></span>
					<?php endif; ?>
				</div>
				<div class="mkdf-prep-info-column">
					<?php if(!empty($calories_num)) : ?>
						<span class="mkdf-prep-info-icon">
							<?php echo piquant_mikado_icon_collections()->renderIcon('icon-chart', 'simple_line_icons'); ?>
						</span>
						<span class="mkdf-prep-info-label"><?php echo esc_html($calories_num); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="mkdf-smi-prep-info-bottom">
			<div class="mkdf-prep-info-time-holder">
				<?php if(!empty($ready_in)) : ?>
					<span class="mkdf-prep-info-time-label"><?php esc_html_e('Ready in', 'piquant'); ?> <?php echo esc_html($ready_in); ?></span>
				<?php endif; ?>
			</div>
			<?php if(!empty($price)) : ?>
				<div class="mkdf-prep-info-price-holder">
					<?php echo esc_html($price); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>