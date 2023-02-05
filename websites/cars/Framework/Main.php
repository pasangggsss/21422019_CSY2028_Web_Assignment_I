<?php
// SLIGHTLY DIFFERENT VERSION OF THE CODE PROVIDED IN LECTURES AND EXERCISES OF THE WEB DEV 2
namespace Framework;
class Main {
	private $routes;

	public function __construct() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		
		
		$page = Route::getResponse($route,$_SERVER['REQUEST_METHOD']);

		$content = $this->loadTemplate('../App/pages/'.$page['template'].'.php', $page['variables'] ?? []);

		$categories = new DatabaseTable('manufacturers');
		$categories = $categories->findAll();
		// just in case forgot to write the title no error is shown
		$title = $page['title'] ?? '';
		require '../app/pages/main.php';
	}

	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}

