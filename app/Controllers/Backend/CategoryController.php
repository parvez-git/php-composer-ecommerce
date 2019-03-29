<?php 

namespace App\Controllers\Backend;

class CategoryController
{
	public function getIndex()
	{
		return view('backend/categories/index');
	}
}