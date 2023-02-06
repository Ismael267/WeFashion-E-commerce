@extends('layouts.app1')

@section('content')
<main>
    <div class="container mt-5">
         <p>{{$compteur}} resultats</p>
      <div class="row">
        @foreach ($hommes as $homme)
        <div class="col-md-3">
          <div class="card">
            <img
              src="{{ asset($homme->image) }}"
              class="card-img-top img-thumbnail"
              alt="Image du produit 1"
            />
            <div class="card-body">
              <h5 class="text-primary">{{$homme->title}} </h5>
              <h6 class="card-price"> {{$homme->getPrice()}}</h6>
              <p class="card-text">{{$homme->description}}</p>
              <a href=" {{route('product.detail', $homme->id)}}" class="btn btn-primary">Acceder au produit</a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>

  </main>
  <div class="flex">{!! $hommes->links() !!}</div>
@endsection

