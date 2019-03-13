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


// RANDOM STRING GENERATE
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