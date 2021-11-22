<?php

class ABIROOT_CLI
{


	public function vc_element($args, $assoc_args)
	{
		$elementsPath = $assoc_args['elements-path'] ?? get_template_directory() . "/vc-elements/elements/";
		if (!is_dir($elementsPath)) {
			wp_mkdir_p($elementsPath);
		}

		$elementName = $assoc_args['name'];
		$elementDomain = $assoc_args['domain'] ?? 'abiroot';
		$elementUCDomain = ucfirst($assoc_args['domain']);
		$elementNiceName = $assoc_args['nice-name'] ?? $elementName;
		$elementShortCode = $assoc_args['shortcode'];

		$variablesList = [
			"name" => $elementName,
			"domain" => $elementDomain,
			"UCdomain" => $elementUCDomain,
			"nice-name" => $elementNiceName,
			"shortcode" => $elementShortCode,
		];

		$directoriesToCreate = [
			$elementsPath . $elementName,
			$elementsPath . $elementName . '/twig-templates/'
		];

		$filesToCreate = [
			"twig-templates/%shortcode%.css",
			"twig-templates/%shortcode%.html.twig",
			"twig-templates/%shortcode%.js",
		];

		//Step 1 - Create Directories
		foreach ($directoriesToCreate as $directory) {
			if (!is_dir($directory)) {
				wp_mkdir_p($directory);
			}
			WP_CLI::log('Created Directory: ' . $directory);

		}

		//Step 2 - Create Files
		foreach ($filesToCreate as $file) {
			$file = $this->replaceVariables($elementsPath . $elementName . '/' . $file, $variablesList);
			$f = fopen($file, 'w');
			WP_CLI::log("Created File: '$file'");
		}

		//Step 3 - Create Main Class
		$subContent = file_get_contents(get_template_directory() . "/inc/AbirootCLI/subs/element.sub");
		$subContent = $this->replaceVariables($subContent, $variablesList);
		if (file_put_contents($elementsPath . $elementName . '/' . $elementName . '.php', $subContent)) {
			WP_CLI::log("Created Parent Class");
		}


	}

	private function replaceVariables($text, $variables)
	{
		$result = $text;
		foreach ($variables as $key => $variable) {
			$result = str_replace("%$key%", $variable, $result);
		}
		return $result;
	}

	public function hello($args, $assoc_args)
	{
		$name = $assoc_args['name'];
		$isPublish = $assoc_args['publish'];

		WP_CLI::line('Hello, ' . $name);
		WP_CLI::line($isPublish ? "Yes" : "No");
		WP_CLI::line(WP_CLI::colorize('%BHellooo %n')); // Returns text in blue color. Ignores --quiet.

		$progress = \WP_CLI\Utils\make_progress_bar('Generating Posts', 10);

		for ($i = 0; $i < 10; $i++) {
			// Code used to generate a post.
			sleep(1);
			$progress->tick();
		}

		$progress->finish();
	}

}
