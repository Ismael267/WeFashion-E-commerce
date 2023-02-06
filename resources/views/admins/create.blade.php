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
    <form  action="{{route('admin.store')}}" method="post" class="w-50" enctype="multipart/form-data" >
        @csrf
      <h1 class="text-center">Création de produit</h1>
      <div class="form-group">
        <label for="productName">Nom du produit :</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="productDescription">Description du produit :</label>
        <textarea class="form-control" id="productDescription" name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="productPrice">Prix du produit :</label>
        <input type="number" class="form-control" id="productPrice" name="price">
      </div>
      <div class="form-group">
        <label for="productName">Reference :</label>
        <input type="text" class="form-control" id="title" name="reference">
      </div>
      <div class="form-group">
        <label for="category">Catégorie :</label>
        <select class="form-control" id="category" name="categorie_name">
          <option value="homme">Homme</option>
          <option value="femme">Femme</option>
        </select>
      </div>
      <div class="form-group">
        <label for="state">state:</label>
        <select class="form-control" id="state" name="state">
          <option value="en solde">en solde</option>
          <option value="standard">standard</option>
        </select>
      </div>
      <div class="form-group">
        <label for="visibilité">visibilité:</label>
        <select class="form-control" id="visibilité" name="visibility">
          <option value="publie">publie</option>
          <option value="non publie">non publie</option>
        </select>
      </div>
      <div class="form-group">
        <label for="visibilité">taille</label>
        <select class="form-control" id="size" name="size">
          <option value="XS">XS</option>
          <option value="XL">XL</option>
          <option value="S">S</option>
          <option value="L">L</option>
          <option value="M">M</option>
        </select>
      </div>
      <div class="form-group">
        <label for="productImage">Image du produit :</label>
        <input type="file" class="form-control-file" id="productImage" name="image">
      </div>
      <br>
      <button type="submit" class="btn btn-success">Créer</button>

    </form>

  </div>
  <a href="{{route('admin.index')}}"><button type="button" class="btn btn-secondary">Retour</button></a>


@endsection



