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


        //$newproduct = new Product();

        //alternativa con fill e fillable
        //$newproduct->fill($form_data);

        //alternativa senza fillable
        // $newproduct->title = $form_data['title'];
        // $newproduct->description = $form_data['description'];
        // $newproduct->type = $form_data['type'];
        // $newproduct->image = $form_data['image'];
        // $newproduct->cooking_time = $form_data['cooking_time'];
        // $newproduct->weight = $form_data['weight'];

        //$newproduct->save();

        //qui sempre con fillable sul model creo l'oggetto, lo popolo e lo salvo sul db
        $newproduct = Product::create($form_data);

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
    public function edit(Product $product)
    {
        //$product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $form_data = $request->all();

        $product->title = $form_data['title'];
        $product->description = $form_data['description'];
        $product->type = $form_data['type'];
        $product->image = $form_data['image'];
        $product->cooking_time = $form_data['cooking_time'];
        $product->weight = $form_data['weight'];

        $product->update();

        return redirect()->route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
