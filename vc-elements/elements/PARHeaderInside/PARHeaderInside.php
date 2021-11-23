<?php

if (!class_exists('PARHeaderInside')) {
	class PARHeaderInside extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARHeaderInside', 'parents'),
				'base' => 'par_header_inside',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Title',
						'type' => 'textfield',
						'param_name' => 'title',
					),
                    array(
                        'heading' => 'Banner Image',
                        'type' => 'attach_image',
                        'param_name' => 'banner',
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_header_inside-style', get_template_directory_uri() .
				"/vc-elements/elements/PARHeaderInside/twig-templates/par_header_inside.css", array(), '1.0');

			wp_enqueue_script('par_header_inside-script', get_template_directory_uri() .
				"/vc-elements/elements/PARHeaderInside/twig-templates/par_header_inside.js", array('jquery'), '1.0', true);


            $banner = wp_get_attachment_image_src($atts['banner'], 'full');

			return $this->twigObj->render("par_header_inside.html.twig", array(
                'title' => $atts['title'],
                'banner' => $banner[0]
            ));
		}
	}
}
