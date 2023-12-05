<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceFormRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.services.index', [
            'services' => Service::paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        //dd($service);
        return view('admin.services.form', [
            'service' => $service,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFormRequest $request)
    {
        $service = Service::create($request->validated());
        return redirect()->route('admin.service.index')->with('success', 'Le service a bien été ajouté !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
