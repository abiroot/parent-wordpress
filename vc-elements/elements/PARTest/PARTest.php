<?php

if (!class_exists('PARTest')) {
	class PARTest extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARTest', 'parents'),
				'base' => 'par_test',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Text',
						'type' => 'tectfield',
						'param_name' => 'button',
					)
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_test-style', get_template_directory_uri() .
				"/vc-elements/elements/PARTest/twig-templates/par_test.css", array(), '1.0');

			wp_enqueue_script('par_test-script', get_template_directory_uri() .
				"/vc-elements/elements/PARTest/twig-templates/par_test.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_test.html.twig", array());
		}
	}
}
