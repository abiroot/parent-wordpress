<?php

if (!class_exists('PARIconLinks')) {
	class PARIconLinks extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARIconLinks', 'parents'),
				'base' => 'par_icon_links',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Icon Links',
                        'type' => 'param_group',
                        'param_name' => 'icon_links',
                        'params' => array(
                            array(
                                'param_name' => "link_text",
                                'type' => 'textfield',
                                'heading' => "Link Text"
                            ),

                            array(
                                'param_name' => "link_url",
                                'type' => 'textfield',
                                'heading' => "Link URL",
                            ),
                            array(
                                'param_name' => "icon",
                                'type' => 'attach_image',
                                'heading' => "Add Icon",
                            ),
                        ),
                        "group" => "General"
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_icon_links-style', get_template_directory_uri() .
				"/vc-elements/elements/PARIconLinks/twig-templates/par_icon_links.css", array(), '1.0');

			wp_enqueue_script('par_icon_links-script', get_template_directory_uri() .
				"/vc-elements/elements/PARIconLinks/twig-templates/par_icon_links.js", array('jquery'), '1.0', true);

            $iconLinks = vc_param_group_parse_atts($atts['icon_links']);
            foreach ($iconLinks as $key => $iconLink) {
                if(isset($iconLink['icon'])){
                    $iconLinks[$key]['icon'] = wp_get_attachment_image_src($iconLink['icon'], 'full')[0];
                }
            }
            return $this->twigObj->render("par_icon_links.html.twig", array(
                "icon_links" => $iconLinks
            ));
		}
	}
}
