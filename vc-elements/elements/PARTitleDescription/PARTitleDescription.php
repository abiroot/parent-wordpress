<?php

if (!class_exists('PARTitleDescription')) {
	class PARTitleDescription extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARTitleDescription', 'parents'),
				'base' => 'par_title_description',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Title',
						'type' => 'textfield',
						'param_name' => 'title',
					),
                    array(
                        'heading' => 'Text',
                        'type' => 'textfield',
                        'param_name' => 'text',
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_title_description-style', get_template_directory_uri() .
				"/vc-elements/elements/PARTitleDescription/twig-templates/par_title_description.css", array(), '1.0');

			wp_enqueue_script('par_title_description-script', get_template_directory_uri() .
				"/vc-elements/elements/PARTitleDescription/twig-templates/par_title_description.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_title_description.html.twig", array(
                'title' => $atts['title'] ?? '',
                'text' => $atts['text'] ?? ''
            ));
		}
	}
}
