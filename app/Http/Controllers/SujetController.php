<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Sujet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use spatie\Permession\Models\Permession;


class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:sujet-list|sujet-create|sujet-edit|sujet-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sujet-create', ['only' => ['create','store']]);
         $this->middleware('permission:sujet-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sujet-delete', ['only' => ['destroy']]);
    }
  
    public function index(Request $request)
    {
        $data = Sujet::select()->get();
        // $encadrant = User::where('id', '=', $data[1]->id_encadrant)->get();
        return view('Sujet.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $encadrant = User::where('type_user' ,'=' , 'EN')->get();
        return view('sujet.create', compact('encadrant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'intitule' => 'required',
            'encadrant' => 'required',
            'description' => 'required',
        ]);
         Sujet::create([
            'intitule' => $request->intitule,
            'id_encadrant' => $request->encadrant,
            'description_sujet' => $request->description,
            'valide' => 0,
        ]);

        return view('sujet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sujet=Sujet::all();
        return view('sujet.index', compact('sujet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sujet = Sujet::find($id);
        $encadrant = User::where('type_user' ,'=' , 'EN')->get();
        return view('sujet.edit', compact('sujet', 'encadrant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
        $id = $request->id;
        $this->validate($request, [
            'intitule' => 'required',
            'encadrant' => 'required',
            'description_sujet' => 'required',
        ]);
        $data = Sujet::select()->get();
         $input = $request->all();
         $sjt = Sujet::where('id', '=', $id)->first();
        $sjt->intitule = $request->intitule;
        $sjt->id_encadrant = $request->encadrant;
        $sjt->description_sujet = $request->description_sujet;
        $sjt->save();
        return view('sujet.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sujet::find($id)->delete();
        $data = Sujet::select()->get();
        return view('sujet.index', compact('data'));
    }
}
