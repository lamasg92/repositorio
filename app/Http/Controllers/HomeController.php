<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $dptos = Departamento::all();
        return view('home.index')->with('dptos',$dptos);
    }
}
