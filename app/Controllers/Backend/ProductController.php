<?php 

namespace App\Controllers\Backend;

class ProductController 
{
    public function getIndex() 
    {
        view('backend/products/index');
    }
}