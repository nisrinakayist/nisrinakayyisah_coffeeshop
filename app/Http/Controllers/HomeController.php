<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Galery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalToko = Toko::count();
        $totalDikunjungi = Galery::distinct('id')->count('id');
        $totalBelumDikunjungi = $totalToko - $totalDikunjungi;
        return view('home', compact('totalToko', 'totalDikunjungi', 'totalBelumDikunjungi'));
    }
}
