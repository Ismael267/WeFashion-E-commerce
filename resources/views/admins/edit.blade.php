@extends('layouts.app2')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
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
        <form action="{{ route('admin.update', $product->id) }}" method="post" class="w-50" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1 class="text-center">Modification de produit</h1>
            <div class="form-group">
                <label for="productName">Nom du produit :</label>
                <input type="text" class="form-control" id="title" value="{{ $product->title }}" name="title">
            </div>
            <div class="form-group">
                <label for="productDescription">Description du produit :</label>
                <textarea class="form-control" id="productDescription" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="productPrice">Prix du produit :</label>
                <input type="number" class="form-control"value="{{ $product->price }}" id="productPrice" name="price">
            </div>
            <div class="form-group">
                <label for="productName">Reference :</label>
                <input type="text" class="form-control" id="title" value="{{ $product->reference }}"
                    name="reference">
            </div>
            <div class="form-group">
                <label for="category">Catégorie :</label>
                <select class="form-control" id="category" name="categorie_name">
                    <option value='homme' @if ($product->categorie->categorie_name == 'homme') {{ 'selected' }} @endif>homme</option>
                    <option value='femme' @if ($product->categorie->categorie_name == 'femme') {{ 'selected' }} @endif>femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="state">state:</label>
                <select class="form-control" id="state" name="state">
                    <option value='en solde' @if ($product->states->state == 'en solde') {{ 'selected' }} @endif>en solde</option>
                    <option value='standard' @if ($product->states->state == 'standard') {{ 'selected' }} @endif>standard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="visibilité">visibilité:</label>
                <select class="form-control" id="visibilité" name="visibility">
                    <option value='publie' @if ($product->visibility->visibility == 'publie') {{ 'selected' }} @endif>publie</option>
                    <option value='non publie' @if ($product->visibility->visibility == 'non publie') {{ 'selected' }} @endif>non publie
                    </option>
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="taille">taille</label>
                <select class="form-control" id="size" name="size">
                    <option value='XS' @if ($product->size->size == 'XS') {{ 'selected' }} @endif>XS</option>
                    <option value='S' @if ($product->size->size == 'S') {{ 'selected' }} @endif>S</option>
                    <option value='M' @if ($product->size->size == 'M') {{ 'selected' }} @endif>M</option>
                    <option value='L' @if ($product->size->size == 'L') {{ 'selected' }} @endif>L</option>
                    <option value='XL' @if ($product->size->size == 'XL') {{ 'selected' }} @endif>XL</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Créer</button>

        </form>

    </div>
    <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-secondary">Retour</button></a>


@endsection
