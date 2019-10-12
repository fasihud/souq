<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use DB;

class ProductsController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $products = Products::orderBy('p_name', 'desc')->get();
        $category = Category::all();
        return view('index', [
            'products' => $products,
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_prod');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'p_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'image | nullable | max:1999'
        ]);

        if($request->hasFile('image'))
        {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('public/cover_img', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noImage.jpg';
        }

        $prod = new Products;
        $prod->p_name = $request->input('p_name');
        $prod->category = $request->input('category');
        $prod->price = $request->input('price');
        $prod->image = $fileNameToStore;
        $prod->save();

        return redirect('/home')->with('success', 'Product addedd successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cart()
    {
        return view('cart');
    }

    public function add_to_cart($id)
    {
        $products = Products::find($id);
        if(!$products){
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id => [
                    'p_name' => $products->p_name,
                    'price' => $products->price,
                    'quantity' => 1
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to the Cart Successfully!');
        }

        if(isset($cart[$id])){
            $cart[$id] ['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to the Cart Successfully!');
        }

        $cart[$id] = [
            'p_name' => $products->p_name,
            'price' => $products->price,
            'quantity' => 1
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to the Cart Successfully!');
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cart(Request $request, $id)
    {
        // if($request->id and $request->input('quantity'))
        // {
        $cart = session()->get('cart');
        if($request->qty != 0)
        {
            $cart[$id] ['quantity'] = $request->qty;

            session()->put('cart', $cart);
        }
        else{
            return $this->delete_item($request, $id);
        }
        return redirect()->back()->with('success', 'Cart Updated Successfully!!');
        // }
        
    }

    public function delete_item(Request $request, $id)
    {
        if($id)
        {
            $cart = session()->get('cart');
            if(isset($cart[$id]))
            {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Item Removed from Cart!!');
        }
    }

    public function categorical_item(Request $request)
    {
        if($request->input('category')==null)
        {
            return $this->index();
        }
        else{
        $cat = $request->input('category');
        $products = Products::where('category', $cat)->get();
        // $category = Category::where('category', $cat)->get();
        // $category = DB::table('categories')
        //                                 ->join('products', 'products.category', 'categories.category')
        //                                 ->where('categories.category', $cat)
        //                                 ->get();
        return view('index')->with('products', $products);
        }
        
    }
}
