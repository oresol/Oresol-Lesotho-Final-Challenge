<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;


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
        $stores = Store::all();

        return view('pages.home', compact('stores'));
        // return view('pages.home', ['stores'=>$stores]);
    }
}
