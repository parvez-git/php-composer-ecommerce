<?php 

namespace App\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Helpers\ValidatorFactory;

class ProductController 
{
    public function getIndex() 
    {
        $products = Product::all();

        view('backend/products/index', ['products' => $products]);
    }

    public function getCreate()
    {
        $categories = Category::all(); 

        view('backend/products/create', ['categories' => $categories]);
    }

	public function postStore()
	{ 
		$title          = $_POST['title'];
		$categoryid     = $_POST['category_id'];
		$description    = $_POST['description'];
		$price          = $_POST['price'];
		$saleprice      = $_POST['sale_price'];
		$slug           = createSlug($_POST['title']);
		$image      	= $_FILES['image'];

		$validator = (new ValidatorFactory())->make(
		    $data = [
		    	'title' 	    => $title,
		    	'category_id' 	=> $categoryid,
		    	'description' 	=> $description,
		    	'price' 	    => $price,
				'sale_price' 	=> $saleprice,
				// 'image'			=> $image['name']
		    ],
		    $rules = [
		    	'title' 	    => 'required|max:255',
		    	'category_id' 	=> 'required',
		    	'description' 	=> 'required',
		    	'price' 	    => 'required',
		    	'sale_price' 	=> 'required',
		    	// 'image' 		=> 'required|image'
		    ]
		);

		if ($validator->fails()) {

			$_SESSION['validator-errors'] = $validator->errors()->all();

			redirect('/dashboard/products/create');
		}
		
		$imgrandname 	= 'product-'.time();
		$imageext 	 	= explode('.', $image['name']);
		$extension 	 	= end($imageext);
		$imagename	 	= 'assets/images/products/' . $imgrandname . '.' . strtolower($extension);

		move_uploaded_file($image['tmp_name'], $imagename);

		$active = isset($_POST['active']) ? true : false;

		try {
			$product = Product::create([
				'title' 	    => $title,
		    	'category_id' 	=> $categoryid,
		    	'description' 	=> $description,
		    	'price' 	    => $price,
		    	'sale_price' 	=> $saleprice,
				'slug' 		    => $slug,
				'image' 		=> $imagename,
				'active' 	    => $active
			]);

			$_SESSION['error'] 				= NULL;
			$_SESSION['validator-errors'] 	= NULL;
			$_SESSION['success'] 			= 'Product created successfully.'; 
	
			redirect('/dashboard/products');

		} catch (\Exception $e) {

			$_SESSION['success'] = NULL;
			$_SESSION['error'] 	 = $e->getMessage();

			redirect('/dashboard/products/create');
		}
    }
    
	public function getEdit($id = null)
	{
		if ($id == null) {
			redirect('/dashboard/products');
		}

		$categories = Category::all();
		$product    = Product::find($id);

		view('backend/products/edit', ['categories' => $categories, 'product' => $product]);
    }
    
    public function postUpdate()
	{
        $id             = $_POST['id']; 
		$title          = $_POST['title'];
		$categoryid     = $_POST['category_id'];
		$description    = $_POST['description'];
		$price          = $_POST['price'];
		$saleprice      = $_POST['sale_price'];
		$image      	= $_POST['image'];
		$slug           = createSlug($_POST['title']);
		$image      	= $_FILES['image'];

		$validator = (new ValidatorFactory())->make(
		    $data = [
		    	'title' 	    => $title,
		    	'category_id' 	=> $categoryid,
		    	'description' 	=> $description,
		    	'price' 	    => $price,
		    	'sale_price' 	=> $saleprice,
		    ],
		    $rules = [
		    	'title' 	    => 'required|max:255',
		    	'category_id' 	=> 'required',
		    	'description' 	=> 'required',
		    	'price' 	    => 'required',
		    	'sale_price' 	=> 'required',
		    ]
		);

		if ($validator->fails()) {

			$_SESSION['validator-errors'] = $validator->errors()->all();

			redirect('/dashboard/products/edit/'.$id);
		}
		
        $active = isset($_POST['active']) ? true : false;
        
		$product = Product::find($id);
		
		if( !empty($image['name']) ) {

			if(file_exists($product->image)) {
				unlink($product->image);
			}

			$imgrandname 	= 'product-'.time();
			$imageext 	 	= explode('.', $image['name']);
			$extension 	 	= end($imageext);
			$imagename	 	= 'assets/images/products/' . $imgrandname . '.' . strtolower($extension);

			move_uploaded_file($image['tmp_name'], $imagename);

		} else {
			$imagename = $product->image;
		}

        $product->update([
            'title' 	    => $title,
            'category_id' 	=> $categoryid,
            'description' 	=> $description,
            'price' 	    => $price,
            'sale_price' 	=> $saleprice,
            'slug' 		    => $slug,
            'image' 		=> $imagename,
            'active' 	    => $active
        ]);

        $_SESSION['error'] 				= NULL;
        $_SESSION['validator-errors'] 	= NULL;
        $_SESSION['success'] 			= 'Product updated successfully.'; 

        redirect('/dashboard/products');
    }

	public function getDelete($id = null)
	{
		if ($id == null) {
			redirect('/dashboard/products');
		}

		$product = Product::find($id);

		if(file_exists($product->image)) {
			unlink($product->image);
		}
		$product->delete();

		$_SESSION['success'] = 'Product deleted successfully.'; 

		redirect('/dashboard/products');
	}
}