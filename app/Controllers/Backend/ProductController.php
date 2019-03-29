<?php 

namespace App\Controllers\Backend;

class ProductController 
{
    public function getIndex() 
    {
        return view('backend/products/index');
    }
}