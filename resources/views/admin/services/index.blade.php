@extends('admin.admin')

@section('title', 'Tous les services')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.service.create') }}" class="btn btn-primary">Ajouter un service</a>
</div>

<table class="table table-stripes">
    <thead>
        <tr>

            <th>Nom</th>

            <th class="text-end">Actions</th>
        </tr>

    </thead>
    <tbody>

    @foreach ($services as $service )


        <tr>

            <td>{{ $service->name }}</td>

            <td>
                <div class="d-flex gap-2 w-100 justify-content-end ">
                    <a href="" class="btn btn-primary"> Editer</a>
                    <form action="" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>

            </td>
        </tr>
        @endforeach
</table>


