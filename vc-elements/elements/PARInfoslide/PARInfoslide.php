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
                        'heading' => 'Title',
                        'type' => 'textfield',
                        'param_name' => 'title',
                    ),
                    array(
                        'heading' => 'Title',
                        'type' => 'textfield',
                        'param_name' => 'title',
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

            wp_enqueue_script('par_infoslide-script', get_template_directory_uri() .
                "/vc-elements/elements/PARInfoslide/twig-templates/par_infoslide.js", array('jquery'), '1.0', true);

            wp_enqueue_script('plugin-splide-script', get_template_directory_uri() .
                "/assets/plugins/splide/js/splide.min.js", array('jquery'), '1.0', true);


            return $this->twigObj->render("par_infoslide.html.twig", array());
        }
    }
}
