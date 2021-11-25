<?php

if (!class_exists('PARInfoslide')) {
    class PARInfoslide extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PARInfoslide', 'parents'),
                'base' => 'par_infoslide',
                'description' => __('', 'parents'),
                'category' => __('Parents Elements', 'parents'),
                'params' => array(
                    array(
                        'heading' => 'Counter Title, Text and Image ',
                        'type' => 'param_group',
                        'param_name' => 'informations',
                        'params' => array(
                            array(
                                'param_name' => "title",
                                'type' => 'textfield',
                                'heading' => "Title"
                            ),

                            array(
                                'param_name' => "text",
                                'type' => 'textfield',
                                'heading' => "Text",
                            ),
                            array(
                                'param_name' => "author",
                                'type' => 'textfield',
                                'heading' => "Author",
                            ),
                            array(
                                'param_name' => "position",
                                'type' => 'textfield',
                                'heading' => "Position",
                            ),
                            array(
                                'param_name' => "image",
                                'type' => 'attach_image',
                                'heading' => "Image",
                            ),
							array(
								'param_name' => "video_url",
								'type' => 'textfield',
								'heading' => "Video URL",
							),
                        ),
                    )
                ),
            ));
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('par_infoslide-style', get_template_directory_uri() .
                "/vc-elements/elements/PARInfoslide/twig-templates/par_infoslide.css", array(), '1.0');

            wp_enqueue_style('plugin-splide-style', get_template_directory_uri() .
                "/assets/plugins/splide/css/splide.min.css", array(), '1.0');

            wp_enqueue_style('plugin-splide-theme-style', get_template_directory_uri() .
                "/assets/plugins/splide/css/splide.theme.css", array(), '1.0');


            wp_enqueue_script('plugin-splide-script', get_template_directory_uri() .
                "/assets/plugins/splide/js/splide.min.js", array('jquery'), '1.0', true);

            wp_enqueue_script('plugin-magnific-popup', get_template_directory_uri() .
                "/assets/plugins/magnificPopup/magnific-popup.min.js", array('jquery'), '1.0', true);
			wp_enqueue_style('plugin-magnific-popup', get_template_directory_uri() .
				"/assets/plugins/magnificPopup/magnific-popup.css", array(), '1.0');



			wp_enqueue_script('par_infoslide-script', get_template_directory_uri() .
				"/vc-elements/elements/PARInfoslide/twig-templates/par_infoslide.js", array('jquery'), '1.0', true);
			$counters = vc_param_group_parse_atts($atts['informations']);

            foreach ($counters as $key => $counter) {
                if(isset($counter['image'])){
                    $counters[$key]['image'] = wp_get_attachment_image_src($counter['image'], 'full')[0];
                }
            }

            return $this->twigObj->render("par_infoslide.html.twig", array(
                'informations' => $counters ?? []
            ));
        }
    }
}
