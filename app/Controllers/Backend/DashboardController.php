<?php 

namespace App\Controllers\Backend;

class DashboardController
{
	public function getIndex()
	{
		view('backend/index');
	}
}