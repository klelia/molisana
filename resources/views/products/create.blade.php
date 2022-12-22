@extends('layouts.app')
@section('content')

<section class="container mt-4">
    <h1 class="text-center">Inserisci nuovo prodotto</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{route('products.store')}}" method="POST" class="p-4">
                @csrf
                  <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" >
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="weight" class="form-label">Peso</label>
                    <input type="text" class="form-control" id="weight" name="weight" required>
                  </div>
                  <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                   <select name="type" id="type" required>
                    <option value="lunga">Lunga</option>
                    <option value="corta">Corta</option>
                    <option value="cortissima">Cortissima</option>
                   </select>
                  </div>
                  <div class="mb-3">
                    <label for="cooking_time" class="form-label">Cottura</label>
                    <input type="text" class="form-control" id="cooking_time" name="cooking_time" aria-describedby="cookingHelp" required>
                    <div id="cookingHelp" class="form-text">Tempo espresso in minuti</div>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Url Immagine</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>

</section>
@endsection
