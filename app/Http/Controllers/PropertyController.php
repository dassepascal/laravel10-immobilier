<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {

        // $properties = Property::paginate(2);
        // return view('properties.index', [
        //     'properties'=> $properties
        // ]);

        $query = Property::query();
        if($price = $request->validated('price')) {
         $query =   $query->where('price', '<=', $price);
        }
        if($surface = $request->validated('surface')) {
            $query =     $query->where('surface', '>=', $surface);
        }
        if($rooms = $request->validated('rooms')) {
            $query =    $query->where('rooms', '>=', $rooms);
        }
        if($title = $request->validated('title')) {

            $query = $query->where('title', 'like',"%{$title}%" );

        }

        return view('properties.index', [
            'properties' => $query->paginate(15),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property) {
        
        $expectedSlug = $property->getSlug();

        if($slug !== $expectedSlug) {
            return redirect()->route('property.show', [
                'slug' => $expectedSlug,
                'property' => $property
            ]);
        }
        return view('properties.show', [
            'property' => $property
        ]);
    }
}
