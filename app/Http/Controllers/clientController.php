<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Cart;
use Session;
use DB;
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

    public function addtocart($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);

        // dd(Session::get('cart'));
        return back();
    }

    public function cart()
    {
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);;
    }

    public function checkout()
    {
        return view('client.checkout');
    }
}
