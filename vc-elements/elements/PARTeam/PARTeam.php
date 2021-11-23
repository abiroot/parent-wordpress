<?php

if (!class_exists('PARTeam')) {
	class PARTeam extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARTeam', 'parents'),
				'base' => 'par_team',
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

			wp_enqueue_style('par_team-style', get_template_directory_uri() .
				"/vc-elements/elements/PARTeam/twig-templates/par_team.css", array(), '1.0');

			wp_enqueue_script('par_team-script', get_template_directory_uri() .
				"/vc-elements/elements/PARTeam/twig-templates/par_team.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_team.html.twig", array());
		}
	}
}
