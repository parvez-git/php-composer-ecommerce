<?php 

namespace App\Controllers\Backend;

use App\Models\Category;
use App\Helpers\ValidatorFactory;

class CategoryController
{
	public function getIndex()
	{
		$categories = Category::all();

		view('backend/categories/index', ['categories' => $categories]);
	}

	public function getCreate()
	{
		view('backend/categories/create');
	}

	public function postStore()
	{
		$name = $_POST['name'];
		$slug = createSlug($_POST['slug']);

		$validator = (new ValidatorFactory())->make(
		    $data = [
		    	'name' 	=> $name,
		    	'slug' 	=> $slug,
		    ],
		    $rules = [
		    	'name' 	=> 'required|max:255',
		    	'slug' 	=> 'required|max:255'
		    ]
		);

		if ($validator->fails()) {

			$_SESSION['validator-errors'] = $validator->errors()->all();

			redirect('/dashboard/categories/create');
		}
		
		$active = isset($_POST['active']) ? true : false;

		try {
			$category = Category::create([
				'name' 		=> $name,
				'slug' 		=> $slug,
				'active' 	=> $active
			]);

			$_SESSION['error'] 				= NULL;
			$_SESSION['validator-errors'] 	= NULL;
			$_SESSION['success'] 			= 'Category created successfully.'; 
	
			redirect('/dashboard/categories');

		} catch (\Exception $e) {

			$_SESSION['success'] = NULL;
			$_SESSION['error'] 	 = $e->getMessage();

			redirect('/dashboard/categories/create');
		}
	}

	public function getEdit($id = null)
	{
		if ($id == null) {
			redirect('/dashboard/categories');
		}

		$category = Category::find($id);

		view('backend/categories/edit', ['category' => $category]);
	}

	public function postUpdate()
	{
		$id   = $_POST['id'];
		$name = $_POST['name'];
		$slug = createSlug($_POST['slug']);

		$validator = (new ValidatorFactory())->make(
		    $data = [
		    	'name' 	=> $name,
		    	'slug' 	=> $slug,
		    ],
		    $rules = [
		    	'name' 	=> 'required|max:255',
		    	'slug' 	=> 'required|max:255'
		    ]
		);

		if ($validator->fails()) {

			$_SESSION['validator-errors'] = $validator->errors()->all();

			redirect('/dashboard/categories/edit/'.$id);
		}
		
		$active = isset($_POST['active']) ? true : false;

		$category = Category::find($id);

		$category->update([
			'name' 		=> $name,
			'slug' 		=> $slug,
			'active' 	=> $active
		]);

		$_SESSION['success'] = 'Category updated successfully.'; 

		redirect('/dashboard/categories');
	}

	public function getDelete($id = null)
	{
		if ($id == null) {
			redirect('/dashboard/categories');
		}

		$category = Category::find($id);
		$category->delete();

		$_SESSION['success'] = 'Category deleted successfully.'; 

		redirect('/dashboard/categories');
	}
}