<?php
	if(!function_exists('piquant_mikado_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function piquant_mikado_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'piquant_mikado_layerslider_overrides');
	}
?>