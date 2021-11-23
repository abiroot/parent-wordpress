<?php

if (!class_exists('PARPricingFeaturesBox')) {
	class PARPricingFeaturesBox extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARPricingFeaturesBox', 'parents'),
				'base' => 'par_pricing_features_box',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Feature Box',
                        'type' => 'param_group',
                        'param_name' => 'featrues_box',
                        'params' =>
                            array(
                                array(
                                    'param_name' => "image",
                                    'type' => 'attach_image',
                                    'heading' => "Image"
                                ),
                                array(
                                    'param_name' => "title",
                                    'type' => 'textfield',
                                    'heading' => "Feature Title"
                                ),
                                array(
                                    'param_name' => "text",
                                    'type' => 'textfield',
                                    'heading' => "Feature Text"
                                )
                            ),
                        "group" => "General"
                    )

                ),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_pricing_features_box-style', get_template_directory_uri() .
				"/vc-elements/elements/PARPricingFeaturesBox/twig-templates/par_pricing_features_box.css", array(), '1.0');

			wp_enqueue_script('par_pricing_features_box-script', get_template_directory_uri() .
				"/vc-elements/elements/PARPricingFeaturesBox/twig-templates/par_pricing_features_box.js", array('jquery'), '1.0', true);

            $featuresBox = vc_param_group_parse_atts($atts['featrues_box']);
            foreach ($featuresBox as $key => $iconLink) {
                if(isset($iconLink['image'])){
                  $featuresBox[$key]['image'] = wp_get_attachment_image_src($iconLink['image'], 'full')[0];
                }
            }
			return $this->twigObj->render("par_pricing_features_box.html.twig", array(
                'features_box'=>$featuresBox
            ));
		}
	}
}
