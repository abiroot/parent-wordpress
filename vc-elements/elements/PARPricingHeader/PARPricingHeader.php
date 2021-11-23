<?php

if (!class_exists('PARPricingHeader')) {
	class PARPricingHeader extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARPricingHeader', 'parents'),
				'base' => 'par_pricing_header',
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

			wp_enqueue_style('par_pricing_header-style', get_template_directory_uri() .
				"/vc-elements/elements/PARPricingHeader/twig-templates/par_pricing_header.css", array(), '1.0');

			wp_enqueue_script('par_pricing_header-script', get_template_directory_uri() .
				"/vc-elements/elements/PARPricingHeader/twig-templates/par_pricing_header.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_pricing_header.html.twig", array());
		}
	}
}
