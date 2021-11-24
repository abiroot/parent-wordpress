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
						'heading' => 'Price Per Child',
						'type' => 'textfield',
						'param_name' => 'price_per_child',
					),
                    array(
                        'heading' => 'Right Image',
                        'type' => 'attach_image',
                        'param_name' => 'right_image',
                    ),
                    array(
                        'heading' => 'Show Free Trial',
                        'type' => 'checkbox',
                        'param_name' => 'free_trial',
                    ),


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

            $side_image = wp_get_attachment_image_src($atts['right_image'], 'full');

			return $this->twigObj->render("par_pricing_header.html.twig", array(
                'price_per_child'=>$atts['price_per_child'] ,
                'right_image'=>$side_image[0],
                'free_trial'=>$atts['free_trial']
            ));
		}
	}
}
