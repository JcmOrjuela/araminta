<?php

namespace app\Controllers;

use app\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::all();

        dd($products);
    }
}
