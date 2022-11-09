<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view("products.create", compact('product', 'categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            "product_name" => 'required',
            "product_price" => 'required',
        ]);

        //file type
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $request->file->store('products', 'public');

            $product = new Product([
                // "product_name" => $request->get('product_name'),
                // "category_id" => $request->get('category_id'),
                // "product_price" => $request->get('product_price'),
                // "product_description" => $request->get('product_description'),
                // "product_image" => $request->file->hashName(),
                // "status"=>1
            ]);

            //   or

            $product = new Product();
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;
            $product->product_image = $request->file->hashName();
            $product->status = $request->status = '1';

            $product->save();
            return redirect()->route('products.index');
        } else {
            dd('False');
        }
    }

    public function edit(Product $product)
    {
        $categories  = Category::all();
        // $product = Product::findOrFail($id);
        return view("products.edit", compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // $product = Product::findOrFail($id);
        // Validate the inputs
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        // //file type
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $request->file->store('products', 'public');

            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->product_price = $request->product_price;
            $product->product_image = $request->file->hashName();
            $product->product_description = $request->product_description;

            $product->update();
            return redirect()->route('products.index');
        }
    }

    public function activate($id)
    {
        $product=Product::findOrFail($id);
        $product->status = 1;
        $product->update();

        return redirect()->route('products.index');
    }

    public function deactivate($id)
    {
        $product=Product::findOrFail($id);
        $product->status = 0;
        $product->update();

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        // $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
