<?php
namespace Framework;
class Route {
	public static $currentRoute = '';
	public static $routesList = [];
	public static function create_new_link($requestMethod, $link, $callable) {
		array_push(Route::$routesList, [$requestMethod, $link, $callable]);
	}

	public static function getResponse($link, $requestMethod) {
		Route::runLoginChecks($link);
		foreach(Route::$routesList as $route) {
			if(strtolower($requestMethod) == strtolower($route[0]) && (str_starts_with($link, $route[1]) || $link == $route[1])) {
				$link = str_replace($route[1], '', $link);
				$_GET['params'] = explode( '/',$link,);
				$page = $route[2]();
				return $page;
			}
		}
	}

	public static function runLoginChecks($link) {

		if(Session::session_user_exists() && $_SESSION['user_system_accesss'] > 10) {
			return;
		}
		if(strpos($link, 'user')) {
			Session::owner();
		}
		if(str_starts_with($link,'add/')) {
			Session::adminAny();
		}
		if(str_starts_with($link,'edit/')) {
			Session::adminAny();
		}
		if(str_starts_with($link,'delete/')) {
			Session::adminAny();
		}
	}

	public function getDefaultRoute() {
		return 'joke/home';
	}

	public static function g_link_header($destination_link) {
		header('Location: '.$destination_link);
		exit;
	}
}