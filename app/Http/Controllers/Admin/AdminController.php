<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //  COMMENTATO PERCHE' ATTIVO IN ROUTES.WEB
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // RESTITUISCE I DATI DELL'UTENTE
        // $user = Auth::user();
        // dump($use->toArray());

        // RESTITUISCE TRUE SE L'UTENTE E' REGISTRATO
        // dump(Auth::check());

        return view('admin.dashboard');
    }
}
