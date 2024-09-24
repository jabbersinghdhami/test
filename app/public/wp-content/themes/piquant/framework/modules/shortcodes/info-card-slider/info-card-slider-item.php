<?php
namespace Piquant\MikadofModules\Shortcodes\InfoCardSlider;

use Piquant\MikadofModules\Shortcodes\Lib\ShortcodeInterface;

class InfoCardSliderItem implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkdf_info_cart_slider_item';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => 'Info Card Slider Item',
            'base'                    => $this->base,
            'category'                => 'by MIKADO',
            'icon'                    => 'icon-wpb-info-card-slider-item extended-custom-icon',
            'as_parent'               => array('except' => 'vc_row'),
            'as_child'                => array('only' => 'mkdf_info_card_slider'),
            'is_container'            => true,
            'show_settings_on_create' => true,
            'params'                  => array_merge(
                array(
                    array(
                        'type'        => 'textfield',
                        'holder'      => 'div',
                        'heading'     => 'Title',
                        'param_name'  => 'title',
                        'admin_label' => true
                    )
                ),
                piquant_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type' => 'attach_image',
                        'heading' => 'Image',
                        'param_name' => 'image',
                        'description' => 'Select image from media library.'
                    ),
                    array(
                        'type'        => 'textarea',
                        'heading'     => 'Front Side Content',
                        'description' => 'Insert text for card front side',
                        'param_name'  => 'front_side_content',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textarea',
                        'heading'     => 'Back Side Content',
                        'description' => 'Insert text for card back side',
                        'param_name'  => 'back_side_content',
                        'admin_label' => true
                    ),
                    array(
                        'type'         => 'textfield',
                        'heading'      => 'Link',
                        'descripition' => 'Insert card link',
                        'param_name'   => 'link',
                        'admin_label'  => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Link Text',
                        'param_name'  => 'link_text',
                        'dependency'  => array('element' => 'link', 'not_empty' => true),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Link Target',
                        'param_name'  => 'link_target',
                        'value'       => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'save_always' => true,
                        'dependency'  => array('element' => 'link', 'not_empty' => true),
                        'admin_label' => true
                    )
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'image'              => '',
            'title'              => '',
            'front_side_content' => '',
            'back_side_content'  => '',
            'link'               => '',
            'link_text'          => '',
            'link_target'        => ''
        );

        $default_atts = array_merge($default_atts, piquant_mikado_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName            = piquant_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $params['icon']          = $iconPackName ? $params[$iconPackName] : '';

        $params['show_image'] = $params['image'] !== '';
        $params['show_icon'] = $params['show_image'] || $params['icon'] !== '';

        $params['button_params'] = $this->getButtonParams($params);
        $params['show_btn']      = count($params['button_params']);

        return piquant_mikado_get_shortcode_module_template_part('templates/info-card-slider-item', 'info-card-slider', '', $params);
    }

    private function getButtonParams($params) {
        $btn_params = array();

        if($params['link'] !== '' && $params['link_text'] !== '') {
            $btn_params['link']      = $params['link'];
            $btn_params['text']      = $params['link_text'];
            $btn_params['target']    = $params['link_target'];
            $btn_params['type']      = 'solid';
        }

        return $btn_params;
    }

}