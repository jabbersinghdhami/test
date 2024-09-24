<div class="mkdf-info-card-slider-item">
    <div class="mkdf-info-card-front-side">
        <?php if($show_icon) : ?>
            <div class="mkdf-info-card-icon-holder">
                <span class="mkdf-image-content">
						<?php if($show_image) : ?>
                            <?php echo wp_get_attachment_image($image); ?>
                        <?php else: ?>
                            <?php echo piquant_mikado_icon_collections()->renderIcon($icon, $icon_pack, array(
                                'icon_attributes' => array(
                                    'class' => 'mkdf-info-card-icon'
                                )
                            )); ?>
                        <?php endif; ?>
					</span>
            </div>
        <?php endif; ?>
        <h4 class="mkdf-info-card-title"><?php echo esc_html($title); ?></h4>
        <div class="mkdf-info-card-front-side-content">
            <p><?php echo esc_html($front_side_content); ?></p>
        </div>
    </div>
    <div class="mkdf-info-card-back-side">
        <div class="mkdf-info-card-back-side-holder">
            <div class="mkdf-info-card-back-side-holder-inner">
                <p><?php echo esc_html($back_side_content); ?></p>

                <?php if($show_btn) : ?>
                    <?php echo piquant_mikado_get_button_html($button_params); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>