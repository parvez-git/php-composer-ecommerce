<?php 

namespace App\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Helpers\ValidatorFactory;

class CartController
{
	public function getIndex()
	{ 
		$cart = $_SESSION['cart'] ?? [];

		$subtotal 		= array_sum(array_column($cart,'total_price'));
		$shippingprice 	= 100;
		$grandtotal 	= $subtotal + $shippingprice;

		view('cart', [
			'cart' 		 	=> $cart,
			'subtotal' 		=> $subtotal,
			'shippingprice' => $shippingprice,
			'grandtotal' 	=> $grandtotal
		]);
	}

	public function postAddcart() 
	{
		$id = (int) $_POST['product_id'];

		$cart = $_SESSION['cart'] ?? [];

		$product = Product::find($id);

		if (empty($product)) {

			redirect('/');

		} else {
			
			if(array_key_exists($id, $cart)) {

				$cart[$id]['quantity']++;  
				$cart[$id]['total_price'] += $product->sale_price;  

			} else {
				
				$cart[$id] = [
					'quantity' 		=> 1,
					'title' 		=> $product->title,
					'image'			=> $product->image,
					'unit_price' 	=> $product->sale_price,
					'total_price' 	=> $product->sale_price
				];
			}
		}

		$_SESSION['cart'] = $cart;

		redirect('/cart');
	}

	public function postRemove()
	{
		$id = (int) $_POST['product_id'];

		unset($_SESSION['cart'][$id]);

		redirect('/cart');
	}

	public function postClear()
	{
		unset($_SESSION['cart']);

		redirect('/cart');
	}
}