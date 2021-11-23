<?php

if (!class_exists('PARContactUsParentMap')) {
	class PARContactUsParentMap extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARContactUsParentMap', 'parents'),
				'base' => 'par_contact_us_parent_map',
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

			wp_enqueue_style('par_contact_us_parent_map-style', get_template_directory_uri() .
				"/vc-elements/elements/PARContactUsParentMap/twig-templates/par_contact_us_parent_map.css", array(), '1.0');

			wp_enqueue_script('par_contact_us_parent_map-script', get_template_directory_uri() .
				"/vc-elements/elements/PARContactUsParentMap/twig-templates/par_contact_us_parent_map.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_contact_us_parent_map.html.twig", array());
		}
	}
}
