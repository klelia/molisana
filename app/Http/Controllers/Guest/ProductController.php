<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $newproduct = new Product();

        $newproduct->title = $form_data['title'];
        $newproduct->description = $form_data['description'];
        $newproduct->type = $form_data['type'];
        $newproduct->image = $form_data['image'];
        $newproduct->cooking_time = $form_data['cooking_time'];
        $newproduct->weight = $form_data['weight'];

        $newproduct->save();

        return redirect()->route('products.show', $newproduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
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
     * @
     */
    public function destroy($id)
    {
        //
    }
}
