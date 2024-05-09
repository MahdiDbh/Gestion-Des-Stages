<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Fichier;
use App\Models\stage;
use App\Models\Sujet;
use App\Models\Taches;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $userYear=2023;
        $userMonth=8;
        $totalsujet = Sujet::select()->count();
        $totalstage = stage::select()->count();
        $totalfichier = Fichier::select()->count();
        $totaluser = User::select()->count();
        // $totalNbrSmsMobilis = 2000;
        // $totalNbrSmsDjezzy = 3000;
        // $totalNbrSmsOoredoo = 4000;
        return view('home',compact('totalsujet','totalstage','totalfichier','totaluser'));
    }
}
