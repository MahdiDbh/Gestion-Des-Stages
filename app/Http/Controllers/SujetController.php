<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Sujet;
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
        $data = Sujet::orderBy('id')->paginate(5);
        return view('Sujet.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

        return view('sujet.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('sujet.create');
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
        //
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
