<?php 

namespace App\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderProduct;

class DashboardController
{
	public function getIndex()
	{
		view('backend/index');
	}

	public function getOrders()
	{
		$address 	= Order::with('products')->get(); 
		$orders  	= OrderProduct::with('order')->get(); 
		$product  	= OrderProduct::with('product')->get();
		
		view('backend/orders/index', ['address' => $address,'orders' => $orders]);
	}
}