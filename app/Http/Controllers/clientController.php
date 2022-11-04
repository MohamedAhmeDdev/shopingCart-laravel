<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function shop()
    {
        $products = Product::where('status', 1)
        ->orderBy('product_name')
        ->take(10)
        ->get();
        return view('client.shop', compact("products"));
    }

    public function cart()
    {
        return view('client.cart');
    }
    public function checkout()
    {
        return view('client.checkout');
    }
    
}



