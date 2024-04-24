<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Stage;
use Models\Models\User;
use CreateStageTable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;


class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:stage-list|stage-create|stage-edit|stage-delete', ['only' => ['index','store']]);
         $this->middleware('permission:stage-create', ['only' => ['create','store']]);
         $this->middleware('permission:stage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:stage-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data = Stage::orderBy('id')->paginate(5);
        return view('Stage.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

        return view('stage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        $encadrant = stage::pluck('id_encadrant')->all();
        $stagiaire = Stage::pluck('id_encadrant')->all();
        return view('stage.create',compact('stagiaire','encadrant'));
        
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
        return view('stage.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
