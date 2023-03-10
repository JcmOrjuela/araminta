<?php

namespace app\Controllers;

use app\Models\Product;
use app\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products/index', compact('products'));
    }

    public function store(Request $r)
    {
        $product = Product::create(
            (array) $r->all()
        );

        return redirect('products');
    }

    public function update(Request $r, $id)
    {
        // $product = Product::update(
        //     (array) $r->all()
        // );

        return redirect('products');
    }

    public function destroy($id)
    {
        $product = Product::softDelete($id);

        return redirect('products');
    }
}
