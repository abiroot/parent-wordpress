<?php

if (!class_exists('AbirootHTML')) {
	class AbirootHTML extends VC_Field_Abstract
	{
		private $field = "abiroot_html";

		public function render($settings, $value)
		{
			return '<div class="abiroot_html" id="abiroot_html_' . uniqid() . '">'
				. '<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="text" value="' . esc_attr($value) . '" />' .
				'</div>'; // This is html markup that will be outputted in content elements edit form
		}


		public function getFieldName()
		{
			return $this->field;
		}

		public function getJsPath()
		{
			$jsPath = sprintf("/vc-elements/fields/%s/%s.js", __CLASS__, $this->getFieldName());
			$jsPath = file_exists(get_template_directory() . $jsPath) ? get_template_directory_uri() . $jsPath : null;
			return $jsPath;
		}
	}
}