<?php

namespace MyControl\Http\Controllers;

use Illuminate\Http\Request;
use MyControl\Incidencia;
use Auth;

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

        $incidencias = Incidencia::where('user_id', Auth::id())->paginate(5);

        //$incidencias->withPath('incidencias/url');

        return view('index', compact('incidencias'));
    }
}
