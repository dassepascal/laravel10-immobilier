@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : "Créer un bien")

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
</div>
    <form
        class="vstack gap-2"
        action="{{ route($property->exists ? 'admin.property-update' : 'admin.property.store', ['property' => $property]) }}"
        method="post">
        @csrf

        @method($property->exists ? 'PUT' : 'POST')

        <div class="row">

                @include('shared.input', ['class' => 'col','label' => 'Titre', 'name' => 'title', 'value' => $property->title])

            <div class="col row">
                @include('shared.input', ['class' => 'col','label' => 'Surface', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['class' => 'col','label' => 'Prix', 'name' => 'price', 'value' => $property->price])
            </div>
        </div>
        @include('shared.input', ['type'=>'textarea','class' => 'col', 'name' => 'description', 'value' => $property->description])




        <button class="btn btn-primary">

            @if($property->exists)
            Modifier
            @else
            Créer
            @endif
        </button>


    </form>

    @endsection
