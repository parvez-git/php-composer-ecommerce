<?php 

namespace App\Controllers\Backend;


class DashboardController
{
	
	public function getIndex()
	{
		return view('backend/index');
	}
}