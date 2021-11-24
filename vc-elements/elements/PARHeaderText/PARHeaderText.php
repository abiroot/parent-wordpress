<?php

if (!class_exists('PARHeaderText')) {
	class PARHeaderText extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARHeaderText', 'parents'),
				'base' => 'par_header_text',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'First Line Header Text',
						'type' => 'textfield',
						'param_name' => 'first_header_text',
					),
                    array(
                        'heading' => 'Second Line Header Text',
                        'type' => 'textfield',
                        'param_name' => 'second_header_text',
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_header_text-style', get_template_directory_uri() .
				"/vc-elements/elements/PARHeaderText/twig-templates/par_header_text.css", array(), '1.0');

			wp_enqueue_script('par_header_text-script', get_template_directory_uri() .
				"/vc-elements/elements/PARHeaderText/twig-templates/par_header_text.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_header_text.html.twig", array(
                'first_header_text'=>$atts['first_header_text'] ,
                'second_header_text'=>$atts['second_header_text'] ,


            ));
		}
	}
}
