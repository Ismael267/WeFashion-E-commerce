@extends('layouts.app2')

@section('content')
    <style>


        #addProductBtn {
               position: absolute;
     top: 70px;
     right: 20px;
     padding: 8px 16px;
     background-color: green;
     color: white;
     border: none;
     border-radius: 4px;
     cursor: pointer;
        }
    </style>



<body>
    <a href="{{route('admin.create')}} "><button id="addProductBtn" >Nouveau</button></a>

  <div id="user_data" class="mt-5">
    <table id="productsTable" class="table">
      <thead class="thead-light">
        <tr>
          <th>Nom</th>
          <th>Catégorie</th>
          <th>Prix</th>
          <th>État</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td>{{$product->title}} </td>
          <td>{{$product->categorie->categorie_name}} </td>
          <td>{{$product->getPrice()}} </td>
          <td>{{$product->states->state}}</td>
          <td>
            <a href="{{route('admin.edit',$product->id)}}" class="btn btn-success">Editer</a>
            {{-- <a href="#" class="">Supprimer</a> --}}
            <form action="{{ route('admin.delete',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="submit" name="submit" class="btn btn-danger" value="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?');">
             </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-center mt-3">{!! $products->links() !!}</div>

</body>

@endsection
