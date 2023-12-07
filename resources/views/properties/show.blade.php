@extends('base')

@section('title', $property->title)

@section('content')

<h1>{{ $property->title }}</h1>
<h2>{{ $property->rooms }} pièces - {{  $property->surface }} m² </h2>

<div class="text-primary fw-bold" style="font-size: 1.4rem; ">
    {{ number_format($property->price,thousands_separator:'') }} €
</div>

<div class="my-4">
    {{ $property->description }}

</div>

<div class="my-4">
    <a href="{{ route('property.index') }}" class="btn btn-secondary">Retour</a>
</div>

@endsection

