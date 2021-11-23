<?php

if (!class_exists('PARInfograph')) {
	class PARInfograph extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARInfograph', 'parents'),
				'base' => 'par_infograph',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Title',
						'type' => 'textfield',
						'param_name' => 'title',
					),
                    array(
                        'heading' => 'Text Area',
                        'type' => 'textarea',
                        'param_name' => 'text_area',
                    ),
                    array(
                        'heading' => 'Redirect Title',
                        'type' => 'textfield',
                        'param_name' => 'redirect_title',
                    ),
                    array(
                        'heading' => 'Redirect URL',
                        'type' => 'textfield',
                        'param_name' => 'redirect_url',
                    ),
                    array(
                        'heading' => 'Video URL',
                        'type' => 'textfield',
                        'param_name' => 'video_url',
                    ),
                    array(
                        'heading' => 'Avatar',
                        'type' => 'attach_image',
                        'param_name' => 'Avatar',
                    ),
                    array(
                        'heading' => 'Has Purple Back Ground',
                        'type' => 'checkbox',
                        'param_name' => 'has_purple_bg',
                    ),
                    array(
                        'heading' => 'Image on The Left',
                        'type' => 'checkbox',
                        'param_name' => 'img_left',
                    ),
                    array(
                        'heading' => 'Button Text',
                        'type' => 'textfield',
                        'param_name' => 'button_text',
                    ),
                    array(
                        'heading' => 'Button URL',
                        'type' => 'textfield',
                        'param_name' => 'button_url',
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_infograph-style', get_template_directory_uri() .
				"/vc-elements/elements/PARInfograph/twig-templates/par_infograph.css", array(), '1.0');

			wp_enqueue_script('par_infograph-script', get_template_directory_uri() .
				"/vc-elements/elements/PARInfograph/twig-templates/par_infograph.js", array('jquery'), '1.0', true);


            $avatar = wp_get_attachment_image_src($atts['avatar'], 'full');

			return $this->twigObj->render("par_infograph.html.twig", array(
                'title' => $atts['title'],
                'text_area' => $atts['text_area'],
                'redirect_title' => $atts['redirect_title'],
                'redirect_url' => $atts['redirect_url'],
                'video' => $atts['video_url'],
                'avatar' => $avatar[0],
                'has_purple_bg' => $atts['has_purple_bg'],
                'img_left' => $atts['img_left'],
                'button_text' => $atts['button_text'],
                'button_url' => $atts['button_url'],
            ));
		}
	}
}
