@extends('layouts.app1')

@section('content')
<main>
    <div class="container mt-5">
         <p>{{$compteur}} resultats</p>
      <div class="row">
        @foreach ($soldes as $solde)
        <div class="col-md-3">
          <div class="card">
            <img
              src="{{ asset($solde->image) }}"
              class="card-img-top"
              alt="Image du produit 1"
            />
            <div class="card-body">
              <h5 class="card-title">{{$solde->title}} </h5>
              <h6 class="card-price"> {{$solde->getPrice()}}</h6>
              <p class="card-text">{{$solde->description}}</p>
              {{-- <a href=" {{route('soldes.show'),$solde->id}}" class="btn btn-primary">Acceder au produit</a> --}}
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>

  </main>
  <div class="flex">{!! $soldes->links() !!}</div>
@endsection

