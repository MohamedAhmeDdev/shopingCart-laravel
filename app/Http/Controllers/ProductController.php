<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view("products.index", compact("product"));
    }

    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view("products.create", compact('product','categories'));
    }

    public function edit($id)
    {
        $category = Category::al();
        $Product = Product::findOrFail($id);
        return view("products.edit", compact('product','category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "product_name"=>'required',
            "product_price"=>'required',
        ]);
        //file type
        if($request->hasFile('file')){
            $request->validate([
                'image'=>'mimes:jpeg,bmp,png'
            ]);
        };
        $request->file->store('product', 'public');

        $product = new Product([
            "product_name" => $request->get('product_name'),
            "category_id" => $request->get('category_id'),
            "product_price" => $request->get('product_price'),
            "product_description" => $request->get('product_description'),
            "product_image" => $request->file->hashName(),
        ]);

        //   or

        // $product = new Product();
        // $product->product_name = $request->product_name;
        // $product->category_id = $request->category_id;
        // $product->product_price = $request->product_price;
        // $product->product_description = $request->product_description;
        // $product->product_image = $request->file->hashName(),
        
        $product->save();
        return redirect()->route('products.index');
    }
}
