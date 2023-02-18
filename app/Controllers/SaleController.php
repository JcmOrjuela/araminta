<?php

namespace app\Controllers;

use app\Models\Product;
use app\Models\Sale;
use app\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        $products = Product::all();

        return view('sales/index', compact('sales','products'));
    }

    public function store(Request $r)
    {
        $Sale = Sale::create(
            (array) $r->all()
        );

        return redirect('sales');
    }

    public function update(Request $r, $id)
    {
        // $Sale = Sale::update(
        //     (array) $r->all()
        // );

        return redirect('sales');
    }

    public function destroy($id)
    {
        $Sale = Sale::softDelete($id);

        return redirect('sales');
    }
}
