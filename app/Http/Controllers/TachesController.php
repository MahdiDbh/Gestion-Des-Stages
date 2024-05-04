<?php

namespace App\Http\Controllers;


use App\Models\Taches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class TachesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:taches-list|taches-create|taches-edit|taches-delete', ['only' => ['index','store']]);
         $this->middleware('permission:taches-create', ['only' => ['create','store']]);
         $this->middleware('permission:taches-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:taches-delete', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $data = Taches::select()->get();
        // $encadrant = User::where('id', '=', $data[1]->id_encadrant)->get();
        return view('taches.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taches = Taches::where('statut', '=', 0)->get();
       return view('taches.create');
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
        ]);
        Taches::create([
            'intitule' => $request->intitule,
            'id_stage' => $request->id_stage,  
            'statut' => 1,     
            
        ]);
         //dd($request);
        return view('taches.index',[
            "data"=>Taches::all() 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taches=Taches:: all();
        return view('taches.index',compact('taches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taches = Taches::find($id);
        dd($taches);
        if ($taches === null) {
            // Redirigez vers une page d'erreur ou retournez une réponse d'erreur
            return redirect('error_page')->with('error', 'Tâche non trouvée');
        }
    
        return view('taches.edit', ['taches' => $taches]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $this->validate($request, [
            'intitule' => 'required',
        ]);
        $data = Taches::select()->get();
         $input = $request->all();
         $taches = Taches::where('id', '=', $id)->first();
         $taches = Taches::select()->get();
        $taches->intitule = $request->intitule;
        $taches->save();
        
        return view('taches.index', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Taches::find($id)->delete();
        $data = Taches::select()->get();
        return view('taches.index', compact('data'));
    }
}
