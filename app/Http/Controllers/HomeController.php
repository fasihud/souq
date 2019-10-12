<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(auth()->user()->status == 'admin'){
            $products = Products::all();
            return view('home')->with('products', $products);
        }
        else{
            return view('cart');
        }

        
            
        

        
    }
}
