<?php

if (!class_exists('PARContactUsForm')) {
    class PARContactUsForm extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PARContactUsForm', 'parents'),
                'base' => 'par_contact_us_form',
                'description' => __('', 'parents'),
                'category' => __('Parents Elements', 'parents'),
                'params' => array(
                    array(
                        'heading' => 'Main Title',
                        'type' => 'textfield',
                        'param_name' => 'main_title',
                    ),
                    array(
                        'heading' => 'Main Text',
                        'type' => 'textfield',
                        'param_name' => 'main_text',
                    ),
                    array(
                        'heading' => 'Country Code Counter',
                        'type' => 'param_group',
                        'param_name' => 'codes',
                        'params' => array(
                            array(
                                'param_name' => "country_code",
                                'type' => 'textfield',
                                'heading' => "Country Code"
                            ),
                            array(
                                'param_name' => "country_abbreviation",
                                'type' => 'textfield',
                                'heading' => "Country Abbreviation"
                            ),
                        ),
                    ),
                    array(
                        'heading' => 'Country Information Counter',
                        'type' => 'param_group',
                        'param_name' => 'informations',
                        'params' => array(
                            array(
                                'param_name' => "country_code",
                                'type' => 'textfield',
                                'heading' => "Country Code"
                            ),

                            array(
                                'param_name' => "country_name",
                                'type' => 'textfield',
                                'heading' => "Country Name",
                            ),

                            array(
                                'param_name' => "country_address",
                                'type' => 'textfield',
                                'heading' => "Country Address",
                            ),

                            array(
                                'param_name' => "country_phone",
                                'type' => 'textfield',
                                'heading' => "Country Phone",
                            ),

                            array(
                                'param_name' => "country_mail",
                                'type' => 'textfield',
                                'heading' => "Country Mail",
                            ),
                        ),
                    )
                ),
            ));
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('par_contact_us_form-style', get_template_directory_uri() .
                "/vc-elements/elements/PARContactUsForm/twig-templates/par_contact_us_form.css", array(), '1.0');

            wp_enqueue_script('par_contact_us_form-script', get_template_directory_uri() .
                "/vc-elements/elements/PARContactUsForm/twig-templates/par_contact_us_form.js", array('jquery'), '1.0', true);


            $counters = vc_param_group_parse_atts($atts['codes']);
            $counters_informations = vc_param_group_parse_atts($atts['informations']);
            return $this->twigObj->render("par_contact_us_form.html.twig", array(
                'main_title' => $atts['main_title'],
                'main_text' => $atts['main_text'],
                'codes' => $counters,
                'informations' => $counters_informations
            ));
        }
    }
}
