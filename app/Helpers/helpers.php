<?php 

if (!function_exists('view')) {
	
	function view($view)
	{
		if (empty($view)) {
			
			return 'No view passed';
		}

		require_once __DIR__ . '/../../views/'.$view.'.php';
	}
}