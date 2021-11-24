<?php

if (!class_exists('PARValues')) {
	class PARValues extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARValues', 'parents'),
				'base' => 'par_values',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Title Text',
						'type' => 'textfield',
						'param_name' => 'title_text',
					) ,
                    array(
                        'heading' => 'Our Values',
                        'type' => 'param_group',
                        'param_name' => 'our_values',
                        'params' => array(
                            array(
                                'param_name' => "value_title",
                                'type' => 'textfield',
                                'heading' => "Title Text"
                            ),
                            array(
                                'param_name' => "value_paragraph",
                                'type' => 'textfield',
                                'heading' => "Value Paragraph"
                            ),

                            array(
                                'param_name' => "icon",
                                'type' => 'attach_image',
                                'heading' => "Add Icon",
                            ),
                        ),
                    )

				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_values-style', get_template_directory_uri() .
				"/vc-elements/elements/PARValues/twig-templates/par_values.css", array(), '1.0');

			wp_enqueue_script('par_values-script', get_template_directory_uri() .
				"/vc-elements/elements/PARValues/twig-templates/par_values.js", array('jquery'), '1.0', true);
            $values = vc_param_group_parse_atts($atts['our_values']);

            foreach ($values as $key => $value) {
                if(isset($value['icon'])){
                    $values[$key]['icon'] = wp_get_attachment_image_src($value['icon'], 'full')[0];
                }
            }
			return $this->twigObj->render("par_values.html.twig", array(
                "values"=>$values
            ));
		}
	}
}
