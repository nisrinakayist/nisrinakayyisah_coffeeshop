<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        return view('menus.index', compact('menus'))
        ->with( (request()->input('page', 1) -2)* 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                     ->store('menus', 'public');
        }
        Menu::create($data);
        return redirect()->route('menus.index')
        ->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')
                                ->store('menus', 'public');
        }

        $menu->update($data);
        return redirect()->route('menus.index')
        ->with('success', 'Menu updated successfully');
        
    //    $menu->update($request->validated());
    //     return redirect()->route('menus.index')
    //     ->with('success', 'Menu updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')
        ->with('success', 'Menu deleted successfully');
    }
}
