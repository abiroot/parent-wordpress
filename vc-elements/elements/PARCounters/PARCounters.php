<?php

if (!class_exists('PARCounters')) {
	class PARCounters extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARCounters', 'parents'),
				'base' => 'par_counters',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Counter',
						'type' => 'param_group',
						'param_name' => 'counters',
						'params' =>
							array(
								array(
									'param_name' => "counter_text",
									'type' => 'textfield',
									'heading' => "Counter Text"
								),
								array(
									'param_name' => "counter_number",
									'type' => 'textfield',
									'heading' => "Number related",
								),
								array(
									'param_name' => "counter_offset",
									'type' => 'textfield',
									'heading' => "Counter Offset",
								),
							),
						"group" => "General"
					)

				),
			));
		}

		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_counters-style', get_template_directory_uri() .
				"/vc-elements/elements/PARCounters/twig-templates/par_counters.css", array(), '1.0');

			wp_enqueue_script('par_counters-script', get_template_directory_uri() .
				"/vc-elements/elements/PARCounters/twig-templates/par_counters.js", array('jquery'), '1.0', true);

			$counters = vc_param_group_parse_atts($atts['counters']);
			$first_counter = $counters[0];
			$other_counters = array_shift($counters);



			return $this->twigObj->render("par_counters.html.twig", array(
				'first_counter' => $first_counter,
				'other_counters' => $counters,
			));
		}
	}
}
