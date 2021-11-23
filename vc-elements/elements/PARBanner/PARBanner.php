<?php

if (!class_exists('PARBanner')) {
	class PARBanner extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARBanner', 'parents'),
				'base' => 'par_banner',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Title',
						'type' => 'textfield',
						'param_name' => 'title',
					),
                    array(
                        'heading' => 'image',
                        'type' => 'attach_image',
                        'param_name' => 'image',
                    ),
                    array(
                        'heading' => 'Text',
                        'type' => 'textfield',
                        'param_name' => 'text',
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
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_banner-style', get_template_directory_uri() .
				"/vc-elements/elements/PARBanner/twig-templates/par_banner.css", array(), '1.0');

			wp_enqueue_script('par_banner-script', get_template_directory_uri() .
				"/vc-elements/elements/PARBanner/twig-templates/par_banner.js", array('jquery'), '1.0', true);

            $image = wp_get_attachment_image_src($atts['image'], 'full');

			return $this->twigObj->render("par_banner.html.twig", array(
                'title' => $atts['title'],
                'image' => $image[0],
                'text' => $atts['text'],
                'button_text' => $atts['button_text'],
                'button_url' => $atts['button_url']
            ));
		}
	}
}
