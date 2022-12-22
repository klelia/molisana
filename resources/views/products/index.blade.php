@extends('layouts.app')
@section('content')
  <section class="container mt-4" id="products">
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <div>
       <form action="{{route('products.index')}}" method="GET">
        <select name="search" id="search">
            <option value="lunga">Lunghe</option>
            <option value="corta">Corte</option>
            <option value="cortissima">Cortissime</option>
        </select>
        <button type="submit" class="btn btn-danger ms-3">Cerca</button>
       </form>
    </div>
    <h1 class="text-center">Prodotti</h1>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="card">
                <img src="{{$product->image}}" class="card-img-top" alt="{{$product->title}}">
                <div class="card-body">
                  <h5 class="card-title">{{$product->title}}</h5>
                  <p class="card-text">{{Str::limit($product->description,80)}}</p>
                  <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Scopri!</a>
                  <a href="{{route('products.edit', $product->id )}}" class="btn btn-primary ms-3">Modifica</a>
                  <form action="{{route('products.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$product->title}}">Cancella</button>
                 </form>

                </div>
              </div>
        </div>
        @endforeach

    </div>
  </section>

 @include('partials.modal_delete')
@endsection
