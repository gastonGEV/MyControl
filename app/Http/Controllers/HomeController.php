<?php

namespace MyControl\Http\Controllers;

use Illuminate\Http\Request;
use MyControl\Incidencia;
use Auth;
use Carbon\Carbon;

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

  
    public function index() {

        if (session('incidencias')) {
            //dd(session('incidencias'));
            $incidencias = session('incidencias');
        } else {
            $now = Carbon::now();
            //mes y año actual
            $incidencias = Incidencia::whereYear('created_at', '=', date($now->year))
                                        ->whereMonth('created_at', '=', date($now->month))
                                        ->where('user_id', Auth::id())
                                        // ->paginate(5);
                                        ->get();
        }

        //dd($incidencias);
        
        return view('index', compact('incidencias'));
    }

      /**
     * recibe peticion
     *
     * @return incidencias filtradas
     */
    public function search(Request $request) {
    
        //mes y año actual
        $now = Carbon::now();

        if (!$request->filled('day') && !$request->filled('month') && !$request->filled('year')) {
            $incidencias = Incidencia::whereYear('created_at', '=', date($now->year))
                                    ->whereMonth('created_at', '=', date($now->month))
                                    ->where('user_id', Auth::id())
                                    //->paginate(5);
                                    ->get();
            $request['month'] = date($now->month);
            $request['year'] = date($now->year);
        }
        //todos
        if ($request->filled('day') && $request->filled('month') && $request->filled('year')) {
            $incidencias = Incidencia::whereDate('created_at', '=', date($request->input('year').'-'.$request->input('month').'-'.$request->input('day')))
                                    ->where('user_id', Auth::id())
                                    // ->paginate(5);
                                    ->get();
        }
        //solo dia
        if ($request->filled('day') && !$request->filled('month') && !$request->filled('year')) {
            $incidencias = Incidencia::whereDay('created_at', date($request->input('day')))
                                        ->where('user_id', Auth::id())
                                        // ->paginate(5);
                                        ->get();
        }
        //solo mes
        if ( $request->filled('month') && !$request->filled('day') && !$request->filled('year')) {
            $incidencias = Incidencia::whereMonth('created_at', date($request->input('month')))
                                    ->where('user_id', Auth::id())
                                    // ->paginate(5);
                                    ->get();
        }
        //solo año
        if ( $request->filled('year') && !$request->filled('day') && !$request->filled('month')) {
            $incidencias = Incidencia::whereYear('created_at', date($request->input('year')))
                                    ->where('user_id', Auth::id())
                                    // ->paginate(5);
                                    ->get();
        }
        //mes y año
        if (!$request->filled('day') && $request->filled('month') && $request->filled('year')) {
            $incidencias = Incidencia::whereYear('created_at', '=', date($request->input('year')))
                                        ->whereMonth('created_at', '=', date($request->input('month')))
                                        ->where('user_id', Auth::id())
                                        // ->paginate(5);
                                        ->get();
        }
        //dia y mes
        if ($request->filled('day') && $request->filled('month') && !$request->filled('year')) {
            $incidencias = Incidencia::whereDay('created_at', '=', date($request->input('day')))
                                        ->whereMonth('created_at', '=', date($request->input('month')))
                                        ->where('user_id', Auth::id())
                                        // ->paginate(5);
                                        ->get();
        }
        //dia y año
        if ($request->filled('day') && !$request->filled('month') && $request->filled('year')) {
            $incidencias = Incidencia::whereDay('created_at', '=', date($request->input('day')))
                                        ->whereYear('created_at', '=', date($request->input('year')))
                                        ->where('user_id', Auth::id())
                                        // ->paginate(5);
                                        ->get();
        }

        //return view('index', compact('incidencias'));
       //tiene que redirigir a 'home' y mostrar la nueva lista

        //return redirect()->route('home', $incidencias);
       //return redirect()->action('HomeController@index', ['id' => 66]);

       //return $request->all();
       return redirect()->route('home')->with('incidencias', $incidencias)->withInput();
       

    }
    
}
