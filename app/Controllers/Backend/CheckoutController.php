<?php 

namespace App\Controllers\Backend;

use App\Models\User;
use App\Models\Order;
use App\Helpers\ValidatorFactory;

class CheckoutController
{
	public function getIndex()
	{
        $user = User::find($_SESSION['userid']);
        
		$cart = $_SESSION['cart'] ?? [];

		$subtotal 		= array_sum(array_column($cart,'total_price'));
		$shippingprice 	= 100;
		$grandtotal 	= $subtotal + $shippingprice;

		view('checkout', [
			'user' 		 	=> $user,
			'cart' 		 	=> $cart,
			'subtotal' 		=> $subtotal,
			'shippingprice' => $shippingprice,
			'grandtotal' 	=> $grandtotal
		]);
    }
    
    public function postShipping()
    {
        $name       = $_POST['name'];
        $email      = $_POST['email'];
        $phone      = $_POST['phone'];
        $address    = $_POST['address'];

        $validator = (new ValidatorFactory())->make(
		    $data = [
		    	'name' 	    => $name,
		    	'email' 	=> $email,
		    	'phone' 	=> $phone,
		    	'address' 	=> $address
		    ],
		    $rules = [
		    	'name' 	    => 'required|max:255',
		    	'email' 	=> 'required|max:255',
		    	'phone' 	=> 'required|max:15',
		    	'address' 	=> 'required'
		    ]
		);

		if ($validator->fails()) {

			$_SESSION['validator-errors'] = $validator->errors()->all();

			redirect('/checkout');
        }

        $cart = $_SESSION['cart'] ?? [];
        $subtotal 		= array_sum(array_column($cart,'total_price'));
		$shippingprice 	= 100;
        $grandtotal 	= $subtotal + $shippingprice;
        
        $order = Order::create([
            'user_id'           => $_SESSION['userid'],
            'name' 	            => $name,
            'email' 	        => $email,
            'phone' 	        => $phone,
            'billing_address' 	=> $address,
            'total_amount'      => $grandtotal,
            'payment_status'    => 'pending',
            'payment_details'   => 'cash on delivery'
        ]);

        foreach($cart as $id => $product) {

            $order->products()->create([
                'product_id'    => $id,
                'quantity'      => $product['quantity'],
                'price'         => $product['unit_price']
            ]);
        }

        $_SESSION['validator-errors'] = NULL;
        $_SESSION['cart'] = [];

        redirect('/');
    }
}