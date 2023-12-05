@extends('admin.admin')

@section('title', $service->exists ? 'Editer un bien' : "Créer un service")

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
</div>

    <form
        class="vstack gap-2"
        action="{{ route($service->exists ? 'admin.service.update' : 'admin.service.store', ['service' => $service]) }}"
        method="post">
        @csrf

        @method($service->exists ? 'PUT' : 'POST')



        <div class="row">

                @include('shared.input', ['class' => 'col','label' => 'Nom', 'name' => 'name', 'value' => $service->name])


        </div>



<div>
    <button class="btn btn-primary">

        @if($service->exists)
        Modifier
        @else
        Créer
        @endif
    </button>

</div>




    </form>

    @endsection
