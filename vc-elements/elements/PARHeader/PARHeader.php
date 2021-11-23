<?php

if (!class_exists('PARHeader')) {
	class PARHeader extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARHeader', 'parents'),
				'base' => 'par_header',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Text',
						'type' => 'textfield',
						'param_name' => 'title',
					) ,
                    array(
                        'heading' => 'Sub Title',
                        'type' => 'textfield',
                        'param_name' => 'sub_title',
                    ) ,
                    array(
                        'heading' => 'Button Text',
                        'type' => 'textfield',
                        'param_name' => 'button_text',
                    ),
                    array(
                        'heading' => 'Redirect To ',
                        'type' => 'textfield',
                        'param_name' => 'href',
                    ),
                    array(
                        'heading' => 'Main Image',
                        'type' => 'attach_image',
                        'param_name' => 'main_image',
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_header-style', get_template_directory_uri() .
				"/vc-elements/elements/PARHeader/twig-templates/par_header.css", array(), '1.0');

			wp_enqueue_script('par_header-script', get_template_directory_uri() .
				"/vc-elements/elements/PARHeader/twig-templates/par_header.js", array('jquery'), '1.0', true);

            $side_image = wp_get_attachment_image_src($atts['main_image'], 'full');
			return $this->twigObj->render("par_header.html.twig", array(
                'title'=>$atts['title'] ,
                'sub_title'=>$atts['sub_title'] ,
                'button_text'=>$atts['button_text'] ,
                'href'=>$atts['href'] ,
                'main_image'=>$side_image[0] ,

            ));
		}
	}
}
