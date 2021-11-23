<?php

if (!class_exists('PAROurVision')) {
	class PAROurVision extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PAROurVision', 'parents'),
				'base' => 'par_our_vision',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Title Text',
						'type' => 'textfield',
						'param_name' => 'title_text',
					),
                    array(
                        'heading' => 'Paragraph Text',
                        'type' => 'textfield',
                        'param_name' => 'paragraph_text',
                    ),
                    array(
                        'heading' => 'Image',
                        'type' => 'attach_image',
                        'param_name' => 'image_url',
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_our_vision-style', get_template_directory_uri() .
				"/vc-elements/elements/PAROurVision/twig-templates/par_our_vision.css", array(), '1.0');

			wp_enqueue_script('par_our_vision-script', get_template_directory_uri() .
				"/vc-elements/elements/PAROurVision/twig-templates/par_our_vision.js", array('jquery'), '1.0', true);

            $side_image = wp_get_attachment_image_src($atts['image_url'], 'full');

			return $this->twigObj->render("par_our_vision.html.twig", array(
                'title_text' => $atts['title_text'] ,
                'paragraph_text'=>$atts['paragraph_text'] ,
                'image_url'=>$side_image[0]

            ));
		}
	}
}
