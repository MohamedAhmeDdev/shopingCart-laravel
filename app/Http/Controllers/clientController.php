<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Cart;
use App\Models\Order;
use Session;
use DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (!Session::has('cart')) {
            return view('client.cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);;
    }

    public function update_quantity(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);
        return back();
    }

    public function removeItem($product_id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return back();
    }



    public function checkout()
    {
        if(Auth::check()){
            return view('client.checkout');
        }
        return view('auth.login');
    }


    public function store(Request $request)
    {
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->cart = serialize($cart);
        $order->save();

        Session::forget('cart');
          return redirect('/');
    }
}
