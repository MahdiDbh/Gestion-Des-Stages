<?php

namespace App\Http\Controllers;

use App\Models\Taches;
use Illuminate\Http\Request;

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
    
    public function index()
    {
        return view('taches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function show(Taches $taches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function edit(Taches $taches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taches $taches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taches  $taches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taches $taches)
    {
        //
    }
}
