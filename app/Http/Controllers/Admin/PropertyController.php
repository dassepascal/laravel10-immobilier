<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(10),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $property = new Property();

        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 2,
            'floor' => 0,
            'city' => 'Rennes',
            'postal_code' => '35000',
            'sold' => false,
            'price' => 100000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl ultricies nunc, quis aliquam nisl nunc sit amet nisl. Nulla facilisi. Sed euismod, nisl eget aliquam ultricies, nunc nisl ultricies nunc, quis aliquam nisl nunc sit amet nisl. Nulla facilisi.
            ',
            'title' => 'Lorem ',
            'adress' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget aliquam ultricies, nunc nisl ultricies nunc, quis aliquam nisl nunc sit amet nisl. Nulla facilisi. Sed euismod, nisl eget aliquam ultricies, nunc nisl ultricies nunc, quis aliquam nisl nunc sit amet nisl. Nulla facilisi.',
        ]);
        $property->save();


        return view('admin.properties.form', [
            'property' => $property,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        return to_route('admin.property.index')->with('success', 'Le bien a bien été ajouté !');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
