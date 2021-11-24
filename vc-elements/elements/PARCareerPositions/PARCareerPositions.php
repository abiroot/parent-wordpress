<?php

if (!class_exists('PARCareerPositions')) {
	class PARCareerPositions extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARCareerPositions', 'parents'),
				'base' => 'par_career_positions',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Main Title',
						'type' => 'textfield',
						'param_name' => 'main_title',
					),
					array(
						'heading' => 'Counter Title and Text',
						'type' => 'param_group',
						'param_name' => 'informations',
						'params' => array(
							array(
								'param_name' => "title",
								'type' => 'textfield',
								'heading' => "Title"
							),
							array(
								'param_name' => "location",
								'type' => 'textfield',
								'heading' => "Location",
							),
							array(
								'param_name' => "time",
								'type' => 'textfield',
								'heading' => "Time",
							),
							array(
								'param_name' => "position",
								'type' => 'textfield',
								'heading' => "Position",
							),
							array(
								'param_name' => "button_title",
								'type' => 'textfield',
								'heading' => "Button Title",
							),
							array(
								'param_name' => "button_url",
								'type' => 'textfield',
								'heading' => "Button URL",
							),
						),
					),
				),
			));
		}

		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_career_positions-style', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerPositions/twig-templates/par_career_positions.css", array(), '1.0');

			wp_enqueue_script('par_career_positions-script', get_template_directory_uri() .
				"/vc-elements/elements/PARCareerPositions/twig-templates/par_career_positions.js", array('jquery'), '1.0', true);

			$counters = vc_param_group_parse_atts($atts['informations']);


			$posts = get_posts([
				'post_type' => 'job-position',
				'post_status' => 'publish',
				'numberposts' => -1
				// 'order'    => 'ASC'
			]);

			$positions = array();
			foreach ($posts as $post) {
				$metaValues = get_post_meta($post->ID);
				$category = get_category_by_slug($metaValues['pa_category'] ? $metaValues['pa_category'][0] : "Uncategorized");

				$positions[] = [
					'title' => $post->post_title,
					"location" => $metaValues['pa_location'][0],
					"time" => $metaValues['pa_employee_type'][0],
					"position" => htmlspecialchars_decode($category->name),
					"button_title" => "View Opening",
					"button_url" => get_permalink($post)
				];
			}


			return $this->twigObj->render("par_career_positions.html.twig", array(
				'informations' => $positions,
				'main_title' => $atts['main_title']
			));
		}
	}
}
