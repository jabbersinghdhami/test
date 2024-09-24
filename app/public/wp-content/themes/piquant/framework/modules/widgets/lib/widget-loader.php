<?php

if (!function_exists('piquant_mikado_register_widgets')) {

	function piquant_mikado_register_widgets() {

		$widgets = array(
			'PiquantMikadoLatestPosts',
			'PiquantMikadoSearchOpener',
			'PiquantMikadoSideAreaOpener',
			'PiquantMikadoStickySidebar',
			'MikadoHtmlPiquantWidget'
		);

		if(piquant_mikado_is_wpml_installed()) {
			$widgets[] = 'PiquantMikadoLanguageDropdown';
		}

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}

}

add_action('widgets_init', 'piquant_mikado_register_widgets');