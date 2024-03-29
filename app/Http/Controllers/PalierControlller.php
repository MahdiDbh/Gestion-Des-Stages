<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Palier;
use App\Models\operateurs;

class PalierControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:palier-list|palier-create|palier-edit|palier-delete', ['only' => ['index','store']]);
         $this->middleware('permission:palier-create', ['only' => ['create','store']]);
         $this->middleware('permission:palier-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:palier-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $palier = Palier::all();
        return view('paliers.index',compact('palier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $op = operateurs::all();
        return view('paliers.create',compact('op'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'SMSC' => 'required',
            'Price' => 'required',
            'Bornsup' =>'required',
            'Borninf' =>'required',
        ],[

            'SMSC.required' => 'Entrer le smsc svp ',
            'Price.required' => 'Entrer le coût svp',
            'Bornsup.required' =>'Entrer le maximum des messages envoyer par mois',
            'Borninf.required' =>'Entrer le minimum des messages envoyer par mois',
        ]);
        Palier::create([

            'SMSC' => $request->SMSC,
            'Price' => $request->Price,
            'Borninf'=> $request->Borninf,
            'Bornsup' => $request->Bornsup,
        ]);

        session()->flash('Add','le palier est ajouter avec succes');
        activity()
        ->causedBy(auth()->user()) // Optionally associate the activity with a user
        ->log('Ajouter un palier');
        return redirect('/paliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $palier=Palier::find($id);
        $op = operateurs::all();
        return View('paliers.edite',compact('palier','op'));
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

        //dd($request);
        $id = $request->id;

        $validatedData = $request->validate([

            'Price' => 'required',
            'Borninf' =>'required',
            'Bornsup' =>'required',

        ],[

            'Price.required' => 'Entrer le coût svp',
            'Borninf.required' =>'Entrer le minimum des messages envoyer par mois',
            'Bornsup.required' =>'Entrer le maximum des messages envoyer par mois',
        ]);

        $input = $request->all();
        $pal = Palier::find($id);
        $pal->update($input);
        activity()
        ->causedBy(auth()->user()) // Optionally associate the activity with a user
        ->log('Modifier un palier');
         return redirect()->route('paliers.index')
         ->with('success','palier mis à jour avec succès');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Palier::find($id)->delete();
        activity()
        ->causedBy(auth()->user()) // Optionally associate the activity with a user
        ->log('Supprimer un palier');
        return redirect()->route('paliers.index')
                        ->with('success','Palier supprimé avec succès.');
    }
}
