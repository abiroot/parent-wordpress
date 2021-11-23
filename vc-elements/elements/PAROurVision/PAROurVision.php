<?php

if (!class_exists('PAROurVision')) {
	class PAROurVision extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PAROurVision', 'parents'),
				'base' => 'par_our_vision',
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

			wp_enqueue_style('par_our_vision-style', get_template_directory_uri() .
				"/vc-elements/elements/PAROurVision/twig-templates/par_our_vision.css", array(), '1.0');

			wp_enqueue_script('par_our_vision-script', get_template_directory_uri() .
				"/vc-elements/elements/PAROurVision/twig-templates/par_our_vision.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_our_vision.html.twig", array());
		}
	}
}
