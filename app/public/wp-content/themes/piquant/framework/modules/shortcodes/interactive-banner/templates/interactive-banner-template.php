<div class="mkdf-ib-holder">
	<div class="mkdf-ib-back">
		<div class="mkdf-ib-back-content">
			<div class="mkdf-ib-back-content-inner">
				<div class="mkdf-ib-overlay">
					<div class="mkdf-ib-overlay-tb">
						<div class="mkdf-ib-overlay-tc">
							<?php if($back_title !== '') : ?>
								<h4 class="mkdf-ib-title"><?php echo esc_html($back_title); ?></h4>
							<?php endif; ?>

							<?php if($back_content !== '') : ?>
							<div class="mkdf-ib-content">
								<p><?php echo esc_html($back_content); ?></p>
							</div>
							<?php endif; ?>

							<?php if(is_array($back_btn_params) && count($back_btn_params)) : ?>
								<?php echo piquant_mikado_get_button_html($back_btn_params); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mkdf-ib-front" <?php piquant_mikado_inline_style($front_holder_styles); ?>>
		<div class="mkdf-ib-front-content">
			<div class="mkdf-ib-overlay">
				<div class="mkdf-ib-overlay-tb">
					<div class="mkdf-ib-overlay-tc">
						<?php if(!empty($first_title)) : ?>
							<h3 <?php piquant_mikado_inline_style($first_title_styles); ?> class="mkdf-ib-title"><?php echo esc_html($first_title); ?></h3>
						<?php endif; ?>

						<?php if(!empty($second_title)) : ?>
							<h3 <?php piquant_mikado_inline_style($second_title_styles); ?> class="mkdf-ib-title"><?php echo esc_html($second_title); ?></h3>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>