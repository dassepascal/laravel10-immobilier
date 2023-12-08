<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
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
            'properties' => Property::orderBy('created_at', 'desc')->paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();

        $property->forceFill([
            'surface' => 40,
            'rooms' => 2,
            'bedrooms' => 1,
            'floor' => 1,
            'city' => 'Auray',
            'postal_code' => '56400',
            'sold' => false,
        ]);


        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name','id'),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
dd($request);
        $property = Property::create($request->validated());
        $property->options()->sync($request->input('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été ajouté !');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {

        //dd($property->toArray());
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),

        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {

        $property->update($request->validated());
        $property->options()->sync($request->input('options', []));
        return to_route('admin.property.index')->with('success', 'Le bien a bien été mis à jour !');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a bien été supprimé !');
    }

}
