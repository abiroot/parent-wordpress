<?php
/**
 * Created by PhpStorm.
 * User: lamba
 */

require_once(get_stylesheet_directory() . "/vendor/autoload.php");

// Check that the class exists before trying to use it
if (!class_exists('WPBakeryShortCode')) {
    echo"Make sure to install the js_composer plugin in order to solve this problem <br> GOOD LUCK! <br> <br>";
}

abstract class VC_Element_Abstract extends WPBakeryShortCode
{
	/**
	 * @var Twig\Environment $twigObj
	 */
	protected $twigObj;

	public function __construct($settings = '')
	{
		parent::__construct($settings);
	}

	protected function initializeTwigTemplate($templates_path = null)
	{
		$reflector = new ReflectionClass(get_class($this));
		$fn = $reflector->getFileName();
		$templates_path = $templates_path ?? dirname($fn) . "/twig-templates";

		$loader = new \Twig\Loader\FilesystemLoader($templates_path);
		$this->twigObj = new \Twig\Environment($loader, [
			'debug' => true,
		]);
		$this->twigObj->addExtension(new \Twig\Extension\DebugExtension());
		$this->twigObj->addExtension(new \Twig\Extension\StringLoaderExtension());
		$this->twigObj->addGlobal("stylesheet_directory_uri", get_stylesheet_directory_uri());
	}

	protected function customMarkupElements($elements = array())
	{
		$html = "<div class='vc_custom-element-container'>";
		foreach ($elements as $element) {
			$html .= "<span style='display: block;'>{{ params.{$element} }}</span>";
		}
		$html .= "</div>";
		return $html;
	}

	abstract public function create_shortcode();

	abstract public function render_shortcode($atts, $content, $tag);
}
