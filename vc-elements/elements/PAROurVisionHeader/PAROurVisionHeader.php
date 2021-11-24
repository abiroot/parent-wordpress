<?php

if (!class_exists('PAROurVisionHeader')) {
	class PAROurVisionHeader extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PAROurVisionHeader', 'parents'),
				'base' => 'par_our_vision_header',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Orange Title Text',
						'type' => 'textfield',
						'param_name' => 'orange_title_text',
					) ,
                    array(
                        'heading' => 'Title Text',
                        'type' => 'textfield',
                        'param_name' => 'title_text',
                    ) ,
                    array(
                        'heading' => 'First Paragraph',
                        'type' => 'textfield',
                        'param_name' => 'first_paragraph',
                    ) ,
                    array(
                        'heading' => 'Second Paragraph',
                        'type' => 'textfield',
                        'param_name' => 'second_paragraph',
                    ) ,
                    array(
                        'heading' => 'Third Paragraph',
                        'type' => 'textfield',
                        'param_name' => 'third_paragraph',
                    ) ,

                ),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_our_vision_header-style', get_template_directory_uri() .
				"/vc-elements/elements/PAROurVisionHeader/twig-templates/par_our_vision_header.css", array(), '1.0');

			wp_enqueue_script('par_our_vision_header-script', get_template_directory_uri() .
				"/vc-elements/elements/PAROurVisionHeader/twig-templates/par_our_vision_header.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("par_our_vision_header.html.twig", array(
                'orange_title_text'=>$atts['orange_title_text'] ?? '' ,
                'title_text'=>$atts['title_text'] ?? '' ,
                'first_paragraph'=>$atts['first_paragraph'] ?? '' ,
                'second_paragraph'=>$atts['second_paragraph']  ?? '' ,
                'third_paragraph'=>$atts['third_paragraph']  ?? '' ,
            ));
		}
	}
}
