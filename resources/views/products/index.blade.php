@extends('layouts.app')
@section('content')
  <section class="container">
    <h1>Prodotti</h1>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <img src="{{$product->image}}" class="card-img-top" alt="{{$product->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$product->title}}</h5>
                  <p class="card-text">{{$product->description}}</p>
                  <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Scopri!</a>
                </div>
              </div>
        </div>
        @endforeach

    </div>
  </section>

@endsection
