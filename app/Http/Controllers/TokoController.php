<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use App\Http\Requests\TokoStoreRequest;
use App\Http\Requests\TokoUpdateRequest;
class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokos = Toko::latest()->paginate(5);
        return view('tokos.index', compact('tokos'))
        ->with( (request()->input('page', 1) -2)* 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tokos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TokoStoreRequest $request)
    {
        Toko::create($request->validated());
        return redirect()->route('tokos.index')
        ->with('success', 'Kategori created successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko)
    {
        return view('tokos.edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TokoUpdateRequest $request, Toko $toko)
    {
        $toko->update($request->validated());
        return redirect()->route('tokos.index')
        ->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect()->route('tokos.index')
        ->with('success', 'Menu deleted successfully');
    }
}
