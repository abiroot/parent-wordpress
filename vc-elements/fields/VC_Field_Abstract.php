<?php
/**
 * Created by PhpStorm.
 * User: lamba
 */

abstract class VC_Field_Abstract
{
	abstract public function getFieldName();
	abstract public function getJsPath();

	/**
	 * @var Twig\Environment $twigObj
	 */
	protected $twigObj;

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


	abstract public function render($settings, $value);
}
