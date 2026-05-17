<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Auth;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('filter') && $request->filter == 'liked') {
            $menus = Auth::user()->likedMenus()->paginate(12);
        }else {
            $menus = Menu::paginate(12);
        }

        return view('menus.index', compact('menus'));
    }

    public function toggleLike($menuId)
    {
        $user = Auth::user();

        if ($user->likedMenus()->where('menu_id', $menuId)->exists()) {
            $user->likedMenus()->detach($menuId);
            return redirect()->back()->with('success', 'Dihapus dari favorit.');
        }else {
            $user->likedMenus()->attach($menuId);
            return redirect()->back()->with('success', 'Berhasil disukai!');
        }
    }
}
