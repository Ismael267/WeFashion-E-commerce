<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Document</title>
</head>
<style>
    .flex {
        display: flex;
        flex-direction: column;
    }
    .navbar-brand{
    color:#66EB9A;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
          {{config('app.name')}}
        </a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Catégories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.index')}}">Produits</a>
            </li>
          </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
          <a class="btn btn-outline-primary my-2 my-sm-0" href="{{route('product.index')}}">  <i class="fas fa-arrow-left"></i> Accueil</a>

        </form>
      </nav>



    @yield('content')

</body>
<footer class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Informations</h5>
          <ul class="list-unstyled">
            <li><a href="#">Mentions légales</a></li>
            <li><a href="#">Presse</a></li>
            <li><a href="#">Fabrication</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Service client</h5>
          <ul class="list-unstyled">
            <li><a href="#">Contactez-nous</a></li>
            <li><a href="#">Livraison & Retour</a></li>
            <li><a href="#">Conditions de vente</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Réseaux sociaux</h5>
          <ul class="list-unstyled d-flex">
            <li class="mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x"></i>
              </a>
            </li>
            <li class="mr-3">
              <a href="#">
                <i class="fab fa-instagram fa-2x"></i>
              </a>
            </li>
          </ul>
          <a href="#" class="btn btn-primary btn-block mt-3">Inscrivez-vous à la newsletter</a>
        </div>
      </div>
    </div>
  </footer>

</html>












