<?php 

namespace Piquant\MikadofModules\AccordionTab;

use Piquant\MikadofModules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class AccordionTab implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'mkdf_accordion_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( array(
				"name" =>  esc_html__( 'Mikado Accordion Tab', 'piquant'),
				"base" => $this->base,
				"as_parent" => array('except' => 'vc_row'),
				"as_child" => array('only' => 'mkdf_accordion'),
				'is_container' => true,
				"category" => 'by MIKADO',
				"icon" => "icon-wpb-accordion-section extended-custom-icon",
				"show_settings_on_create" => true,
				"js_view" => 'VcColumnView',
				"params" => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'piquant'),
						'param_name' => 'title',
						'admin_label' => true,
						'value' => esc_html__( 'Section', 'piquant'),
						'description' => esc_html__( 'Enter accordion section title.', 'piquant')
					),
					array(
						'type' => 'el_id',
						'heading' => esc_html__( 'Section ID', 'piquant'),
						'param_name' => 'el_id',
						'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'piquant'), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'piquant') . '</a>' ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => "Title Tag",
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"p"  => "p",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						),
						"description" => ""
					)
				)

			));
		}
	}	
	public function render($atts, $content = null) {

		$default_atts = (array(
			'title'	=> 'Accordion Title',
			'title_tag' => 'h4',
			'el_id' => ''
		));
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= piquant_mikado_get_shortcode_module_template_part('templates/accordion-template','accordions', '',$params);

		return $output;
		
	}

}