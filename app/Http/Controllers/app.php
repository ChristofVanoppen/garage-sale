<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Http\Controllers\Controller;

class app extends Controller
{
    public function getHome()
    {

        $products = Product::all();
        return view('app.home')->with(compact('products'));
    }

     public function getCreate()
    {

        return view('app.create');

    }

     public function postCreate(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

         Product::create([
            'title' => $request['title'],
            'category' => $request['category'],
            'price' => $request['price'],
            'description' => $request['description'],
        ]);

    }
}
