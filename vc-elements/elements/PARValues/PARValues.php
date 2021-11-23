<?php

if (!class_exists('PARValues')) {
	class PARValues extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARValues', 'parents'),
				'base' => 'par_values',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Text',
						'type' => 'textfield',
						'param_name' => 'button',
					)
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_values-style', get_template_directory_uri() .
				"/vc-elements/elements/PARValues/twig-templates/par_values.css", array(), '1.0');

			wp_enqueue_script('par_values-script', get_template_directory_uri() .
				"/vc-elements/elements/PARValues/twig-templates/par_values.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_values.html.twig", array());
		}
	}
}
