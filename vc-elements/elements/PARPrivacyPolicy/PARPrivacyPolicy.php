<?php

if (!class_exists('PARPrivacyPolicy')) {
	class PARPrivacyPolicy extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PARPrivacyPolicy', 'parents'),
				'base' => 'par_privacy_policy',
				'description' => __('', 'parents'),
				'category' => __('Parents Elements', 'parents'),
				'params' => array(
					array(
						'heading' => 'Pages',
						'type' => 'param_group',
						'param_name' => 'policy_pages',
						'params' => array(
							array(
								'param_name' => "main_title",
								'type' => 'textfield',
								'heading' => "Main Title"
							),
							array(
								'param_name' => "sub_title",
								'type' => 'textfield',
								'heading' => "Sub Title",
							),
							array(
								'param_name' => "category",
								'type' => 'textfield',
								'heading' => "Category",
							),
							array(
								'param_name' => "main_content",
								'type' => 'abiroot_html',
								'heading' => "Content"
							),

							array(
								'param_name' => "main_image",
								'type' => 'attach_image',
								'heading' => "Main Image"
							),
						),
						"group" => "General"
					),
				),
			));
		}

		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('par_privacy_policy-style', get_template_directory_uri() .
				"/vc-elements/elements/PARPrivacyPolicy/twig-templates/par_privacy_policy.css", array(), '1.0');

			wp_enqueue_script('par_privacy_policy-script', get_template_directory_uri() .
				"/vc-elements/elements/PARPrivacyPolicy/twig-templates/par_privacy_policy.js", array('jquery'), '1.0', true);

			$pages = vc_param_group_parse_atts($atts['policy_pages']);
			array_walk($pages, function (&$item, $va) {
				if (!empty($item['main_content'])) {
					if(isBase64Encoded($item['main_content'])) {
						$item['main_content'] = base64_decode($item['main_content']);
					}
				}
				$item['main_image'] = wp_get_attachment_image_src($item['main_image'], 'medium');
				$item['main_image'] = $item['main_image'][0];
			});


			return $this->twigObj->render("par_privacy_policy.html.twig", array(
				"pages" => $pages,
				"pages_titles" => array_column($pages, "main_title")
			));
		}
	}
}
