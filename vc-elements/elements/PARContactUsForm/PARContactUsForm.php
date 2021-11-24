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

			$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
			$contact_forms = array();
			if ($cf7) {
				foreach ($cf7 as $cform) {
					$contact_forms[$cform->post_title] = $cform->ID;
				}
			} else {
				$contact_forms[esc_html__('No contact forms found', 'eivolo')] = 0;
			}


			// Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PARContactUsForm', 'parents'),
                'base' => 'par_contact_us_form',
                'description' => __('', 'parents'),
                'category' => __('Parents Elements', 'parents'),
                'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Select contact form', 'parents'),
						'param_name' => 'contact_form_id',
						'value' => $contact_forms,
						'save_always' => true,
						'description' => esc_html__('Choose previously created contact form from the drop down list.', 'parents'),
						'group' => "Contact Form"
					),
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
                        'heading' => 'Facebook URL',
                        'type' => 'textfield',
                        'param_name' => 'facebook',
                    ),
                    array(
                        'heading' => 'Twitter URL',
                        'type' => 'textfield',
                        'param_name' => 'twitter',
                    ),
                    array(
                        'heading' => 'Instagram URL',
                        'type' => 'textfield',
                        'param_name' => 'instagram',
                    ),
                    array(
                        'heading' => 'Pinterest URL',
                        'type' => 'textfield',
                        'param_name' => 'pinterest',
                    ),
                    array(
                        'heading' => 'Youtube URL',
                        'type' => 'textfield',
                        'param_name' => 'youtube',
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
                            array(
                                'param_name' => "map_url",
                                'type' => 'textfield',
                                'heading' => "Google maps iframe URL",
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
                'youtube' => $atts['youtube'] ?? '#',
                'instagram' => $atts['instagram'] ?? '#',
                'facebook' => $atts['facebook'] ?? '#',
                'twitter' => $atts['twitter'] ?? '#',
                'pinterest' => $atts['pinterest'] ?? '#',
                'codes' => $counters,
                'informations' => $counters_informations,
				"contact_form_html" => do_shortcode('[contact-form-7 id="' .$atts['contact_form_id'] .'"]'),
			));
        }
    }
}
