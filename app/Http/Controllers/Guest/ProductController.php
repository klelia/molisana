<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        //dd($request->query());
       if(!empty($request->query('search'))){
            $type = $request->query('search');
            //dd($type);
            $products = Product::where('type', $type)->get();
       } else {
        $products = Product::all();
       }

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
        // $request->validate([
        //     'title' => 'required|min:5|max:50',
        //     'type' => 'required|max:20',
        //     'image' => 'required|max:250',
        //     'cooking_time' => 'required|max:20',
        //     'weight' => 'required|max:20',
        // ]);

        $form_data = $this->validation($request->all());
        //$form_data = $request->all();


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

        //$form_data = $request->all();
        $form_data = $this->validation($request->all());
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
        return redirect()->route('products.index')->with('message', "Il tuo prodottocon id:  {$product->id}  è stato  cancellato con successo !");
    }

    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:5|max:50',
            'type' => 'required|max:20',
            'image' => 'required|max:250',
            'cooking_time' => 'required|max:20',
            'weight' => 'required|max:20',
        ], [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'Il titolo deve essere lungo almeno :min caratteri.',
            'title.max' => 'Il titolo non può superare i :max caratteri.',
            'type.required' => 'Il tipo è obbligatorio.',
            'type.max' => 'Il tipo non può superare i :max caratteri.',
            'cooking_time.required' => 'Il tempo cottura è obbligatorio.',
            'cooking_time.max' => 'Il tempo cottura non può superare i :max caratteri.',
            'weight.required' => 'Il peso è obbligatorio.',
            'weight.max' => 'Il peso non può superare i :max caratteri.',
        ])->validate();

        return $validator;
    }
}

