<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- tom-select --}}
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <title>@yield('title' ) </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Accueil</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button
          @php
                $route = Route::currentRouteName();
          @endphp
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              {{-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li> --}}
              <li class="nav-item">
                <a @class(['nav-link','active' => str_contains($route,'property.')]) href="{{ route('admin.property.index') }}">Gérer les biens</a>
              </li>
              <li class="nav-item">
                <a @class(['nav-link','active' => str_contains($route,'option.')]) href="{{ route('admin.option.index') }}">Gérer les options</a>
              </li>

            </ul>

          </div>
        </div>
      </nav>
    <div class="container mt-5 ">

        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        @yield('content')
    </div>
    <script>
    new TomSelect('select[multiple]', {
        plugins: {
            remove_button: {
                title: 'Supprimer',
            }
        },

    });

    </script>

</body>

</html>
