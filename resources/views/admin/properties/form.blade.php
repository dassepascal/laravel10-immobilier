@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : "Créer un bien")

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
</div>
    <form
        action="{{ route($property->exists ? 'admin.property-update' : 'admin.property.store', ['property' => $property]) }}"
        method="post">
        @csrf

        @method($property->exists ? 'PUT' : 'POST')

        @include('shared.input', ['label' => 'Titre', 'name' => 'title', 'value' => $property->title])


        <button class="btn btn-primary">

            @if($property->exists)
            Modifier
            @else
            Créer
            @endif
        </button>


    </form>

    @endsection
