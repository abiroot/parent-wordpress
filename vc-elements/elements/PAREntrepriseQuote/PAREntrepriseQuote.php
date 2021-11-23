<?php

if (!class_exists('PAREntrepriseQuote')) {
	class PAREntrepriseQuote extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PAREntrepriseQuote', 'parents'),
				'base' => 'par_entreprise_quote',
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

			wp_enqueue_style('par_entreprise_quote-style', get_template_directory_uri() .
				"/vc-elements/elements/PAREntrepriseQuote/twig-templates/par_entreprise_quote.css", array(), '1.0');

			wp_enqueue_script('par_entreprise_quote-script', get_template_directory_uri() .
				"/vc-elements/elements/PAREntrepriseQuote/twig-templates/par_entreprise_quote.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_entreprise_quote.html.twig", array());
		}
	}
}
