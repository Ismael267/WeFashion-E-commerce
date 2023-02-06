@extends('layouts.app1')

@section('content')
<main>
    <div class="container mt-5">
         <p>{{$compteur}} resultats</p>
      <div class="row">
        @foreach ($femmes as $femme)
        <div class="col-md-3">
          <div class="card">
            <img
              src="{{ asset($femme->image) }}"
              class="card-img-top"
              alt="Image du produit 1"
            />
            <div class="card-body">
              <h5 class="text-primary">{{$femme->title}} </h5>
              <h6 class="card-price"> {{$femme->getPrice()}}</h6>
              <p class="card-text">{{$femme->description}}</p>
              <a href=" {{route('product.detail',$femme->id)}}" class="btn btn-primary">Acceder au produit</a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>

  </main>
  <div class="flex">{!! $femmes->links() !!}</div>
@endsection

