<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class app extends Controller
{
    public function getHome()
    {
        if (!Auth::check()) 
        {
            return redirect('/auth/login')->withErrors(['Je moet aangemeld zijn.']);
        }

        $user = Auth::user();
        $products = Product::all();
        
        $favorites = Favorite::where('userId',$user->id)->select('productId')->get();

        $array=array();

        foreach ($favorites as $favorite) 
        {
            $array[] += $favorite->productId;
        }

        $array = array_flip($array);

        foreach ($products as $product) {
            if (array_key_exists($product->id,$array))
            {
                $product->favorite = 'yes';
            }
            else
            {
                $product->favorite = 'no';
            }
        } 

        return view('app.home')->with(compact('products','user'));
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

        $user = Auth::user();

        Product::create([
            'title' => $request['title'],
            'category' => $request['category'],
            'price' => $request['price'],
            'description' => $request['description'],
            'userId' => $user->id,
        ]);

        return redirect('/home')->with('message','Product is aangemaakt!');

    }

    public function getRemove($productId) //uit link
    {

       if (!Auth::check()) 
       {
            return redirect('/auth/login')->withErrors(['Je moet aangemeld zijn.']);
        }

        $product = Product::find($productId);

        if(!isset($product))
        {
            return redirect('/home')->withErrors(['Dit product bestaat niet!']);
        }

        $user = auth::user();

        if($user->id != $product->userId)
        {
            return redirect('/home')->withErrors(['Dit product is niet van u']);
        }
        
        Favorite::where('productId',$productId)->delete();

        $product->delete();


        return redirect('/home')->with('message','Product is verwijderd!');

    }

    public function getModify($productId)
    {

        if (!Auth::check()) 
       {
            return redirect('/auth/login')->withErrors(['Je moet aangemeld zijn.']);
        }

        $product = Product::find($productId);

         if(!isset($product))
        {
            return redirect('/home')->withErrors(['Dit product bestaat niet!']);
        }

        $user = auth::user();

        if($user->id != $product->userId)
        {
            return redirect('/home')->withErrors(['Dit product is niet van u']);
        }

          return view('app.modify')->with(compact('product','user'));

    }

     public function postModify($productId,Request $request)
    {

        if (!Auth::check()) 
       {
            return redirect('/auth/login')->withErrors(['Je moet aangemeld zijn.']);
        }

        $product = Product::find($productId);

         if(!isset($product))
        {
            return redirect('/home')->withErrors(['Dit product bestaat niet!']);
        }

        $user = auth::user();

        if($user->id != $product->userId)
        {
            return redirect('/home')->withErrors(['Dit product is niet van u']);
        }


         $this->validate($request, [
            'title' => 'required|max:255',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

        
       $product->title = $request['title'];
       $product->category = $request['category'];
       $product->price = $request['price'];
       $product->description = $request['description'];
       $product->save();

       return redirect('/home')->with('message','Dit product is bewerkt!');
        
    }

     public function getFavorite()
    {
        if (!Auth::check()) 
        {
            return redirect('/auth/login')->withErrors(['Je moet aangemeld zijn.']);
        }

        $user = auth::user();

        $favorites = Favorite::where('userId', $user->id)->select('productId')->get();

        foreach ($favorites as $favorite) {
            $favorite->product=Product::find($favorite->productId);
        }

        return view('app.favorite')->with(compact('favorites','user'));
    }

    public function postFavorite()
    {
        $data = Input::all();;
        if (!Auth::check()) 
        {
            return redirect('/auth/login')->withErrors(['Je moet aangemeld zijn.']);
        }

        $user = auth::user();

        $check = Favorite::where('userId',$user->id)->where('productId',$data['id'])->count();

        if($check == 0)
        {
            $favorite = new Favorite();
            $favorite->userId = $user->id;
            $favorite->productId = $data['id'];
            $favorite->save();
            $html = 'Ontvolg';
        }
        else
        {

            Favorite::where('userId',$user->id)->where('productId',$data['id'])->delete();
            $html = 'Volg';
        }

       return $html;
    }
}
