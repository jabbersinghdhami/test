<?php
namespace Piquant\MikadofModules\Shortcodes\InfoCardSlider;

use Piquant\MikadofModules\Shortcodes\Lib\ShortcodeInterface;

class InfoCardSlider implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkdf_info_card_slider';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => 'Info Card Slider',
            'base'                    => $this->base,
            'as_parent'               => array('only' => 'mkdf_info_cart_slider_item'),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'category'                => 'by MIKADO',
            'icon'                    => 'icon-wpb-info-card-slider extended-custom-icon',
            'js_view'                 => 'VcColumnView',
            'params'                  => array(
                array(
                    'type'        => 'dropdown',
                    'heading'     => 'Navigation Skin',
                    'description' => 'Choose navigation skin',
                    'param_name'  => 'navigation',
                    'admin_label' => true,
                    'value'       => array(
                        'Dark'    => 'dark',
                        'Light'   => 'light'
                    ),
                    'save_always' => true
                ),
            )
        ));
    }

    public function render($atts, $content = null) {
        $params = array(
            'content' => $content,
            'navigation'         => 'dark',
        );

        $params = shortcode_atts($params, $atts);

        $dark_light_nav = 'mkdf-carousel-navigation-';

        if ($params['navigation'] == 'light') {
            $dark_light_nav .= 'light';
        } else {
            $dark_light_nav .= 'dark';
        }

        $params['dark_light'] = $dark_light_nav;

        return piquant_mikado_get_shortcode_module_template_part('templates/info-card-slider-holder', 'info-card-slider', '', $params);
    }

}