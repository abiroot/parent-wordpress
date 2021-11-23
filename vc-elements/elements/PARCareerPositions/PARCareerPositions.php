<?php

if (!class_exists('PARCareerPositions')) {
	class PARCareerPositions extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARCareerPositions', 'parents'),
				'base' => 'par_career_positions',
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

			wp_enqueue_style('par_career_positions-style', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerPositions/twig-templates/par_career_positions.css", array(), '1.0');

			wp_enqueue_script('par_career_positions-script', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerPositions/twig-templates/par_career_positions.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_career_positions.html.twig", array());
		}
	}
}