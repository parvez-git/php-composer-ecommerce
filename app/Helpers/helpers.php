<?php 

if (!function_exists('view')) {
	
	function view($view, $data = [])
	{
		extract($data);
		
		if (empty($view)) {
			
			return 'No view passed';
		}

		require_once __DIR__ . '/../../views/'.$view.'.php';
	}
}

// FRONT-END PARTIALS
if (!function_exists('partials')) {
	
	function partials($view)
	{
		if (empty($view)) {
			
			return 'No partials passed!';
		}

		require_once __DIR__ . '/../../views/partials/'.$view.'.php';
	}
}

// BACKEND PARTIALS
if (!function_exists('backendpartials')) {
	
	function backendpartials($view)
	{
		if (empty($view)) {
			
			return 'No backend partials passed!';
		}

		require_once __DIR__ . '/../../views/backend/partials/'.$view.'.php';
	}
}

// REDIRECT
if (!function_exists('redirect')) {
	
	function redirect($location = '/') {

		header('Location: '.$location);
		exit();
	}
}

// RANDOM STRING GENERATOR
if (!function_exists('randomString')) {

	function randomString($length = 60) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
}

// CREATE SLUG FROM STRING
if (!function_exists('createSlug')) {

	function createSlug($str, $delimiter = '-') {

		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));

		return $slug;
	} 
} 