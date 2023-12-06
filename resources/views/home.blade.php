@extends('base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
        <h1>Agence Lorem ipsum</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem at vitae quos accusamus doloremque explicabo dolorem sit eligendi in dolores id voluptate tenetur esse omnis, dolorum voluptatibus laborum, mollitia architecto!</p>

    </div>
</div>


<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property )
        <div class="col">
            @include('properties.card')
        </div>

        @endforeach
    </div>
</div>
@endsection
