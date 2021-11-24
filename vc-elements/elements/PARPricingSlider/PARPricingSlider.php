<?php

if (!class_exists('PARPricingSlider')) {
	class PARPricingSlider extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARPricingSlider', 'parents'),
				'base' => 'par_pricing_slider',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Counter',
                        'type' => 'param_group',
                        'param_name' => 'counters',
                        'params' =>
                            array(
                                array(
                                    'param_name' => "counter_text",
                                    'type' => 'textfield',
                                    'heading' => "Number of children"
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
          			wp_enqueue_style('par_pricing_slider-style', get_template_directory_uri() .
				"/vc-elements/elements/PARPricingSlider/twig-templates/par_pricing_slider.css", array(), '1.0');

			wp_enqueue_script('par_pricing_slider-script', get_template_directory_uri() .
				"/vc-elements/elements/PARPricingSlider/twig-templates/par_pricing_slider.js", array('jquery'), '1.0', true);


            $counters = vc_param_group_parse_atts($atts['counters']);
            $array = [];
            $i=0 ;
            foreach ($counters as $counter) {
                $i=$i+1;
                if($i<=3){
                    array_push($array , $counter['counter_text']);
                }
            }
            array_push($array , '75+') ;
            return $this->twigObj->render("par_pricing_slider.html.twig", array(
                'counter' => $array
            ));
		}
	}
}
