<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Sujet;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Fichier;
use App\Models\stage;
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
    
    public function index(Request $request)
    {
        $data = Fichier::where('id_sujet', '!=' , null)
        ->with('sujet')
        // ->with('user')
        ->get();
       
        return view('fichier.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $sujet = Sujet::where('valide','=', 2)->get();
        
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

        // dd($request->sujet);

        $stage = stage::where('id_sujet', $request->sujet)->first();
        $request->validate([
            'sujet' => 'required',
            'path_memoire' => 'required', 
            'path_code' => 'required',
           
        ]);

        if($request->has('path_memoire','path_code')){
            $file = $request->file('path_memoire');
            $file = $request->file('path_code');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/fichier/';
            $file->move($path, $filename);
        }
    
        Fichier::create([
            'id_sujet' => $request->sujet,
            'id_stage' => $stage->id,
            'path_memoire' => $path.$filename,
            'path_code' => $path.$filename,
        ]);
        //dd($request);   
        return redirect()->route('fichier.index'); 
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
    public function destroy($id)
    {
        Fichier::find($id)->delete();
        $data = Fichier::select()->get();
        return view('fichier.index', compact('data'));
    }
}
