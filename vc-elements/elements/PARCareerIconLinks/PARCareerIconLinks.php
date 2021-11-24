<?php

if (!class_exists('PARCareerIconLinks')) {
	class PARCareerIconLinks extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARCareerIconLinks', 'parents'),
				'base' => 'par_career_icon_links',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Counter Title and Icon',
                        'type' => 'param_group',
                        'param_name' => 'informations',
                        'params' => array(
                            array(
                                'param_name' => "title",
                                'type' => 'textfield',
                                'heading' => "Title"
                            ),
                            array(
                                'param_name' => "icon",
                                'type' => 'attach_image',
                                'heading' => "Icon",
                            ),
                            array(
                                'param_name' => "url",
                                'type' => 'textfield',
                                'heading' => "URL",
                            ),
                        ),
                    ),
                    array(
                        'heading' => 'Main Title',
                        'type' => 'textfield',
                        'param_name' => 'main_title',
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_career_icon_links-style', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerIconLinks/twig-templates/par_career_icon_links.css", array(), '1.0');

			wp_enqueue_script('par_career_icon_links-script', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerIconLinks/twig-templates/par_career_icon_links.js", array('jquery'), '1.0', true);


            $counters = vc_param_group_parse_atts($atts['informations']);

            foreach ($counters as $key => $counter) {
                if(isset($counter['icon'])){
                    $counters[$key]['icon'] = wp_get_attachment_image_src($counter['icon'], 'full')[0];
                }
            }

			return $this->twigObj->render("par_career_icon_links.html.twig", array(
                'informations' => $counters,
                'main_title' => $atts['main_title']
            ));
		}
	}
}
