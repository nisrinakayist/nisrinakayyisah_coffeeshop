<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Toko;
use Illuminate\Http\Request;
use App\Http\Requests\GaleryStoreRequest;
use App\Http\Requests\GaleryUpdateRequest;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galerys = Galery::latest()->paginate(5);
        $toko= Toko::pluck('nama_toko', 'id');
        return view('galerys.index', compact('galerys', 'toko'))
        ->with( (request()->input('page', 1) -2)* 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galerys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GaleryStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                     ->store('galerys', 'public');
        }
        Galery::create($data);
        return redirect()->route('galerys.index')
        ->with('success', 'Galery created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        $toko= Toko::pluck('nama_toko', 'id');
        return view('galerys.edit', compact('galery', 'toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GaleryUpdateRequest $request, Galery $galery)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')
                                ->store('galerys', 'public');
        }

        $galery->update($data);
        return redirect()->route('galerys.index')
        ->with('success', 'Galery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        $galery->delete();
        return redirect()->route('galerys.index')
        ->with('success', 'Galery deleted successfully');
    }
}
