<?php

namespace MyControl\Http\Controllers;

use Illuminate\Http\Request;
use MyControl\Incidencia;

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
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $incidencias = Incidencia::all();

        //return $incidencias->medioPago->nombre;

        return view('index', compact('incidencias'));
    }
}
