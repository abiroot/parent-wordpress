<?php

if (!class_exists('PARBlogHeader')) {
	class PARBlogHeader extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARBlogHeader', 'parents'),
				'base' => 'par_blog_header',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Text Title',
						'type' => 'textfield',
						'param_name' => 'text_title',
					),
                    array(
                        'heading' => 'Text Paragraph',
                        'type' => 'textfield',
                        'param_name' => 'text_paragraph',
                    ),
                    array(
                        'heading' => 'Link URL',
                        'type' => 'textfield',
                        'param_name' => 'url',
                    ),
                    array(
                        'heading' => 'Side Image',
                        'type' => 'attach_image',
                        'param_name' => 'side_image',
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_blog_header-style', get_template_directory_uri() .
				"/vc-elements/elements/PARBlogHeader/twig-templates/par_blog_header.css", array(), '1.0');

			wp_enqueue_script('par_blog_header-script', get_template_directory_uri() .
				"/vc-elements/elements/PARBlogHeader/twig-templates/par_blog_header.js", array('jquery'), '1.0', true);

            $side_image = wp_get_attachment_image_src($atts['side_image'], 'full')[0];

            return $this->twigObj->render("par_blog_header.html.twig", array(

                'text_title'=>$atts['text_title'],
                'text_paragraph'=>$atts['text_paragraph'],
                'image_url'=>$side_image,
                'link_url'=>$atts['url']
            ));
		}
	}
}
