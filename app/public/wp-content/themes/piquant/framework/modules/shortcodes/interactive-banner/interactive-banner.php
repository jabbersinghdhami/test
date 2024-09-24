<?php
namespace Piquant\MikadofModules\Shortcodes\InteractiveBanner;

use Piquant\MikadofModules\Shortcodes\Lib\ShortcodeInterface;

class InteractiveBanner implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_interactive_banner';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => 'Mikado Interactive Banner',
			'base'                      => $this->base,
			'category'                  => 'by MIKADO',
			'icon'                      => '',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'attach_image',
					'heading'     => 'Background Image',
					'param_name'  => 'bg_image',
					'value'       => '',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Front Panel'
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'First Title',
					'param_name'  => 'first_title',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Front Panel'
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => 'First Title Color',
					'param_name'  => 'first_title_color',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Front Panel',
					'dependency'  => array('element' => 'first_title', 'not_empty' => true)
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Second Title',
					'param_name'  => 'second_title',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Front Panel'
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => 'Second Title Color',
					'param_name'  => 'second_title_color',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Front Panel',
					'dependency'  => array('element' => 'second_title', 'not_empty' => true)
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Title',
					'param_name'  => 'back_title',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Back Panel'
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Button Text',
					'param_name'  => 'back_button_text',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Back Panel'
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Button Link',
					'param_name'  => 'back_button_link',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Back Panel'
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Button Target',
					'param_name'  => 'back_button_target',
					'value'       => array(
						'Same Window' => '',
						'New Window'  => '_blank'
					),
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Back Panel'
				),
				array(
					'type'        => 'textarea',
					'heading'     => 'Content',
					'param_name'  => 'back_content',
					'save_always' => true,
					'admin_label' => true,
					'group'       => 'Back Panel'
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'bg_image'           => '',
			'first_title'        => '',
			'first_title_color'  => '',
			'second_title'       => '',
			'second_title_color' => '',
			'back_title'         => '',
			'back_button_text'   => '',
			'back_button_link'   => '',
			'back_button_target' => '',
			'back_content'       => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['front_holder_styles'] = $this->getFrontHolderStyles($params);
		$params['back_btn_params']     = $this->getBackBtnParams($params);
		$params['first_title_styles']  = $this->getFirstTitleStyles($params);
		$params['second_title_styles']  = $this->getSecondTitleStyles($params);

		return piquant_mikado_get_shortcode_module_template_part('templates/interactive-banner-template', 'interactive-banner', '', $params);
	}

	private function getFrontHolderStyles($params) {
		$styles = array();

		if($params['bg_image'] !== '') {
			$bg_id = wp_get_attachment_url($params['bg_image']);

			if($bg_id !== '') {
				$styles[] = 'background-image: url('.$bg_id.')';
			}
		}

		return $styles;
	}

	private function getBackBtnParams($params) {
		$btnParams = array();

		if($params['back_button_text'] !== '') {
			$btnParams['text'] = $params['back_button_text'];
		}

		if($params['back_button_link'] !== '') {
			$btnParams['link'] = $params['back_button_link'];
		}

		if($params['back_button_target'] !== '') {
			$btnParams['target'] = $params['back_button_link'];
		}

		$btnParams['hover_color']            = '#fff';
		$btnParams['hover_border_color']     = '#fff';
		$btnParams['hover_background_color'] = 'transparent';
		$btnParams['size']                   = 'small';
		return $btnParams;
	}

	private function getFirstTitleStyles($params) {
		$styles = array();

		if($params['first_title_color'] !== '') {
			$styles[] = 'color: '.$params['first_title_color'];
		}

		return $styles;
	}

	private function getSecondTitleStyles($params) {
		$styles = array();

		if($params['second_title_color'] !== '') {
			$styles[] = 'color: '.$params['second_title_color'];
		}

		return $styles;
	}
}
