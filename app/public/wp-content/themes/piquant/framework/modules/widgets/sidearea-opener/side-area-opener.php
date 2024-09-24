<?php

class PiquantMikadoSideAreaOpener extends PiquantMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_side_area_opener', // Base ID
            'Mikado Side Area Opener' // Name
        );

        $this->setParams();
    }

    protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'side_area_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> 'Icon Color',
				'description'	=> 'Define color for Side Area opener icon'
			)
		);

    }


    public function widget($args, $instance) {
		
		$sidearea_icon_styles = array();

	    print $args['before_widget'];

		if ( !empty($instance['side_area_opener_icon_color']) ) {
			$sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
		}
		
		$icon_size = '';
		if ( piquant_mikado_options()->getOptionValue('side_area_predefined_icon_size') ) {
			$icon_size = piquant_mikado_options()->getOptionValue('side_area_predefined_icon_size');
		}
		?>
        <a class="mkdf-side-menu-button-opener <?php echo esc_attr( $icon_size ); ?>" <?php piquant_mikado_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo piquant_mikado_get_side_menu_icon_html(); ?>
        </a>

	    <?php print $args['after_widget']; ?>
    <?php }

}