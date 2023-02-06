@extends('layouts.app2')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>oops!</strong> Il ya un probleme avec un champ renseigné.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="d-flex justify-content-center">
    <form  action="{{route("admin.update",$product->id) }}" method="post" class="w-50" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
      <h1 class="text-center">Création de produit</h1>
      <div class="form-group">
        <label for="productName">Nom du produit :</label>
        <input type="text" class="form-control" id="title" value="{{$product->title}}" name="title">
      </div>
      <div class="form-group">
        <label for="productDescription">Description du produit :</label>
        <input class="form-control" id="productDescription" name="description" value="{{$product->description}}" ></input>
      </div>
      <div class="form-group">
        <label for="productPrice">Prix du produit :</label>
        <input type="number" class="form-control"value="{{$product->price}}"  id="productPrice" name="price">
      </div>
      <div class="form-group">
        <label for="productName">Reference :</label>
        <input type="text" class="form-control" id="title" value="{{$product->reference}}"  name="reference">
      </div>
      <div class="form-group">
        <label for="category">Catégorie :</label>
        <select class="form-control" id="category" name="categorie_name">
            <option value="homme" {{ $product->categorie_name == "homme" ? "selected" : "" }}>Homme</option>
            <option value="femme" {{ $product->categorie_name == "femme" ? "selected" : "" }}>Femme</option>
         </select>
      </div>
      <div class="form-group">
        <label for="state">state:</label>
        <select class="form-control" id="state" name="state">
            <option value="en solde" {{ $product->state == "en solde" ? "selected" : "" }}>en solde</option>
            <option value="standard" {{ $product->state == "standard" ? "selected" : "" }}>standard</option>
         </select>
      </div>
      <div class="form-group">
        <label for="visibilité">visibilité:</label>
        <select class="form-control" id="visibilité" name="visibility">
            <option value="publie" {{ $product->visibility == "publie" ? "selected" : "" }}>publie</option>
            <option value="non publie" {{ $product->visibility == "non publie" ? "selected" : "" }}>non publie</option>
         </select>
      </div>
      <div class="form-group">
        <label for="visibilité">taille</label>
        <select class="form-control" id="size" name="size">
            <option value="XS" {{ $product->size == "XS" ? "selected" : "" }}>XS</option>
            <option value="XL" {{ $product->size == "XL" ? "selected" : "" }}>XL</option>
            <option value="S" {{ $product->size == "S" ? "selected" : "" }}>S</option>
            <option value="L" {{ $product->size == "L" ? "selected" : "" }}>L</option>
            <option value="M" {{ $product->size == "M" ? "selected" : "" }}>M</option>
         </select>
      </div>
      <div class="form-group">
        <label for="productImage">Image du produit :</label>
        <input type="file" class="form-control-file" id="productImage" value="{{"storage/images".$product->image}}" name="image">
      </div>
      <br>
      <button type="submit" class="btn btn-success">Créer</button>

    </form>

  </div>
  <a href="{{route('admin.index')}}"><button type="button" class="btn btn-secondary">Retour</button></a>


@endsection



