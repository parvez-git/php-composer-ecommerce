<?php 

namespace App\Controllers\Frontend;

use App\Models\User;
use App\Helpers\ValidatorFactory;

class HomeController
{
	
	public function getIndex()
	{
		return view('index');
	}


	public function getLogin()
	{
		return view('auth/login');
	}

	public function getRegister()
	{
		return view('auth/register');
	}

	public function postRegister()
	{

		$validator = (new ValidatorFactory())->make(
		    $data = [
		    	'name' 		=> $_POST['name'],
		    	'email' 	=> $_POST['email'],
		    	'password' 	=> $_POST['password'],
		    ],
		    $rules = [
		    	'name' 		=> 'required|min:3',
		    	'email' 	=> 'required|email',
		    	'password' 	=> 'required|min:6'
		    ]
		);

		// $validator->fails();
		// $validator->passes();
		// $validator->errors();

		if ($validator->fails()) {

			$_SESSION['validate-name'] = $validator->errors()->get('name');
			$_SESSION['validate-email'] = $validator->errors()->get('email');
			$_SESSION['validate-password'] = $validator->errors()->get('password');

			header('Location: /register');
			exit();
		}
			
		User::create([
			'name' 		=> $_POST['name'],
			'email' 	=> $_POST['email'],
			'password' 	=> $_POST['password'],
			'active' 	=> 0
		]);

		header('Location: /login');
		exit();
	}
}