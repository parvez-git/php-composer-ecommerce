<?php 

namespace App\Controllers\Backend;

use Dompdf\Dompdf;
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
		$product  	= OrderProduct::with('product')->get(); die($product);
		
		view('backend/orders/index', [
				'address' => $address,
				'orders'  => $orders
			]
		);
	}

	public function getInvoice($id = NULL) 
	{
		if ($id != NULL) {
			
			$dompdf = new Dompdf();

			$order 	= Order::with('products')->find($id); 

			include_once BASE_URL . '/views/backend/orders/invoice.php';

			$dompdf->loadHtml($html);
			
			$dompdf->setPaper('A4', 'landscape');
			$dompdf->render();
			$dompdf->stream();
		}

		redirect('/dashboard/orders');
	}
}