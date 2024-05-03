<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Sujet;

use App\Models\Fichier;
use Illuminate\Http\Request;

class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:fichier-list|fichier-create|fichier-edit|fichier-delete', ['only' => ['index','store']]);
         $this->middleware('permission:fichier-create', ['only' => ['create','store']]);
         $this->middleware('permission:fichier-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:fichier-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        return view("fichier.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $sujet = Sujet::where('valide', '=', 1)->get();
        
        return view('fichier.create',compact('sujet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'path_memoire' => 'required|string|pdf', 
            'path_code' => 'required|string|zip', 
        ]);
    
        Fichier::create([
            'id_stage' => $request->id_stage,
            'path_memoire' => $request->path_memoire,
            'path_code' => $request->path_code,
        ]);
        //dd($request);
    
        return redirect()->route('fichier.index'); // Redirige vers la liste des sujets (ajustez selon votre application)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichier $fichier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichier $fichier)
    {
        //
    }
}
