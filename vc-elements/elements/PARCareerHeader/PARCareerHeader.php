<?php

if (!class_exists('PARCareerHeader')) {
	class PARCareerHeader extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARCareerHeader', 'parents'),
				'base' => 'par_career_header',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
                        'heading' => 'Counter Title and Text',
                        'type' => 'param_group',
                        'param_name' => 'informations',
                        'params' => array(
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
                    ),
                    array(
                        'heading' => 'Banner Image',
                        'type' => 'attach_image',
                        'param_name' => 'banner',
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_career_header-style', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerHeader/twig-templates/par_career_header.css", array(), '1.0');

			wp_enqueue_script('par_career_header-script', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerHeader/twig-templates/par_career_header.js", array('jquery'), '1.0', true);


            $counters = vc_param_group_parse_atts($atts['informations']);
            $banner = wp_get_attachment_image_src($atts['banner'], 'full');

			return $this->twigObj->render("par_career_header.html.twig", array(
                'informations' => $counters ?? [],
                'banner' => $banner[0] ?? ''
            ));
		}
	}
}
