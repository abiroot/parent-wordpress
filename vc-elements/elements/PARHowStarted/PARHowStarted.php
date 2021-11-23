<?php

if (!class_exists('PARHowStarted')) {
	class PARHowStarted extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARHowStarted', 'parents'),
				'base' => 'par_how_started',
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

			wp_enqueue_style('par_how_started-style', get_template_directory_uri() .
				"/vc-elements/elements/PARHowStarted/twig-templates/par_how_started.css", array(), '1.0');

			wp_enqueue_script('par_how_started-script', get_template_directory_uri() .
				"/vc-elements/elements/PARHowStarted/twig-templates/par_how_started.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_how_started.html.twig", array());
		}
	}
}
