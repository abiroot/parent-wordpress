<?php

if (!class_exists('PARInfoImage')) {
	class PARInfoImage extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARInfoImage', 'parents'),
				'base' => 'par_info_image',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Counter Title and Text',
                        'type' => 'param_group',
                        'param_name' => 'title_text',
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
                        'heading' => 'Image',
                        'type' => 'attach_image',
                        'param_name' => 'image',
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_info_image-style', get_template_directory_uri() .
				"/vc-elements/elements/PARInfoImage/twig-templates/par_info_image.css", array(), '1.0');

			wp_enqueue_script('par_info_image-script', get_template_directory_uri() .
				"/vc-elements/elements/PARInfoImage/twig-templates/par_info_image.js", array('jquery'), '1.0', true);


            $counters = vc_param_group_parse_atts($atts['title_text']);
            $image = wp_get_attachment_image_src($atts['image'], 'full');
			return $this->twigObj->render("par_info_image.html.twig", array(
                'title_text' => $counters ?? [],
                'image' => $image[0] ?? ''
            ));
		}
	}
}
