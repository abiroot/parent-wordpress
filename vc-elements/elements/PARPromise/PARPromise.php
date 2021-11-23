<?php

if (!class_exists('PARPromise')) {
	class PARPromise extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARPromise', 'parents'),
				'base' => 'par_promise',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
                    array(
                        'heading' => 'Right Image',
                        'type' => 'attach_image',
                        'param_name' => 'right_image',
                    ),
                    array(
                        'heading' => 'Title Text',
                        'type' => 'textfield',
                        'param_name' => 'title_text',
                    ),
                    array(
                        'heading' => 'First Text',
                        'type' => 'textfield',
                        'param_name' => 'first_text',
                    ),
                    array(
                        'heading' => 'Second Text',
                        'type' => 'textfield',
                        'param_name' => 'second_text',
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_promise-style', get_template_directory_uri() .
				"/vc-elements/elements/PARPromise/twig-templates/par_promise.css", array(), '1.0');

			wp_enqueue_script('par_promise-script', get_template_directory_uri() .
				"/vc-elements/elements/PARPromise/twig-templates/par_promise.js", array('jquery'), '1.0', true);

            $side_image = wp_get_attachment_image_src($atts['right_image'], 'full');

			return $this->twigObj->render("par_promise.html.twig", array(
                'left_image' => $side_image[0] ?? '',
                'title_text'=>$atts['title_text'] ?? '',
                'first_paragraph'=>$atts['first_text'] ?? '',
                'second_paragraph'=>$atts['second_text'] ?? '',

            ));
		}
	}
}
