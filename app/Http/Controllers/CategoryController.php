<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      public function index () {
        $categories = Category::all();
         return view("categories.index", compact("categories"));
      }

      public function create ()
      {
          $category = new Category();
          return view("categories.create",compact('category'));
      }
      public function store()
      {
      }

}
