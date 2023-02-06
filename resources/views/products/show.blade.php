@extends('layouts.app1')

@section('content')
<div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset($product->image) }}" alt="Image du produit"  style="max-height: 300px;">
      </div>
      <div class="col-md-6 d-flex flex-column justify-content-between">
        <div>
          <h3 class="text-primary">{{$product->title}}</h3>
          <p>{{$product->description}}</p>
        </div>
        <div>
          <p class="font-weight-bold">{{$product->getPrice()}}</p>
          <label for="size">Taille :</label>
          <select id="size" class="form-control">
            <option value="small">XS</option>
            <option value="medium">XL</option>
            <option value="large">M</option>
            <option value="large">S</option>
            <option value="large">L</option>
          </select>
        </div>
        <div>
          <button type="button" class="btn btn-primary btn-block">Acheter</button>
        </div>
      </div>
    </div>
  </div>
@endsection

