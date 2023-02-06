@extends('layouts.app1')

@section('content')
    <main>
        <div class="container mt-5">
            <p>{{ $compteur }} resultats</p>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset($product->image) }}" class="img-fluid w-100"   alt="Image du produit 1" />
                            <div class="card-body">
                                <h5 class="text-primary">{{ $product->title }} </h5>
                                <h6 class="card-price"> {{ $product->getPrice() }}</h6>
                                <p class="card-text">{{ $product->description }}</p>
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-primary">Acceder au produit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    <div class="flex">{!! $products->links() !!}</div>
@endsection
