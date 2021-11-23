<?php

if (!class_exists('PARCarersIconList')) {
	class PARCarersIconList extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARCarersIconList', 'parents'),
				'base' => 'par_carers_icon_list',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Counter Title and Text and Icon',
                        'type' => 'param_group',
                        'param_name' => 'informations',
                        'params' => array(
                            array(
                                'param_name' => "icon",
                                'type' => 'attach_image',
                                'heading' => "Icon"
                            ),
                            array(
                                'param_name' => "title",
                                'type' => 'textfield',
                                'heading' => "Title"
                            ),
                            array(
                                'param_name' => "text",
                                'type' => 'textfield',
                                'heading' => "text",
                            ),
                        ),
                        "group" => "General"
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_carers_icon_list-style', get_template_directory_uri() .
				"/vc-elements/elements/PARCarersIconList/twig-templates/par_carers_icon_list.css", array(), '1.0');

			wp_enqueue_script('par_carers_icon_list-script', get_template_directory_uri() .
				"/vc-elements/elements/PARCarersIconList/twig-templates/par_carers_icon_list.js", array('jquery'), '1.0', true);

            $counters = vc_param_group_parse_atts($atts['informations']);

            foreach ($counters as $key => $counter) {
                if(isset($counter['icon'])){
                    $counters[$key]['icon'] = wp_get_attachment_image_src($counter['icon'], 'full')[0];
                }
            }
			return $this->twigObj->render("par_carers_icon_list.html.twig", array(
                'informations' => $counters
            ));
		}
	}
}
