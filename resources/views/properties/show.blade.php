@extends('base')

@section('title', $property->title)

@section('content')

<div class="container mt-2">
<h1>{{ $property->title }}</h1>
<h2>{{ $property->rooms }} pièces - {{  $property->surface }} m² </h2>

<div class="text-primary fw-bold" style="font-size: 4rem; ">
    {{ number_format($property->price,thousands_separator:'') }} €
</div>




<hr>
<div class="mt-4">
    <h4>Intéressé par ce bien</h4>
    <form action="" method="post" class="vstack gap-3">
        @csrf
        <div class="row">
            @include('shared.input', ['class' => 'col','label' => 'Prénom', 'name' => 'firstname', ])
            @include('shared.input', ['class' => 'col','label' => 'Nom', 'name' => 'name', ])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col','label' => 'Téléphone', 'name' => 'phone', ])
            @include('shared.input', ['class' => 'col','label' => 'Email', 'name' => 'email', ])
        </div>

        @include('shared.input', ['type' => 'textarea','class' => 'col','label' => 'Votre message', 'name' => 'message', ])

        <button class="btn btn-primary mt-2">
            Nous contacter

        </button>
    </form>
</div>
<div class="mt-4">
    <p>{{nl2br($property->description)}}</p>
    <div class="row">
        <div class="col-8">
            <h2>Caractéristique</h2>
        </div>
        <div class="col-4">
            <h2>Spécificités</h2>
            <ul class="list-group">
                @dump($property->options())
                {{-- @foreach($property->options() as $option)
                <li class="list-group-item">{{ $option->name }}</li>
                @endforeach --}}
            </ul>

    </div>
</div>
</div>
@endsection

