<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Stage;
use App\Models\Sujet;
use App\Models\User;



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
        $data = Stage::where('id_sujet', '!=' , null)
        ->with('statut', 'user','sujet')
        // ->with('user')
        ->get();

        //  dd($data);
        return view('Stage.index',compact('data'));

            // ->with('i', ($request->input('page', 1) - 1) * 5);

        // return view('stage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        
        $encadrant = User::where('type_user' ,'=' , 'EN')->get();
        // dd($encadrant);
        $stagiaire = User::where('type_user' ,'=' , 'ST')->get();
        
        $sujet = Sujet::where('valide', '=', 1)->get();

        return view('stage.create',compact('stagiaire','encadrant' ,'sujet'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //   dd($request);
        $data = Stage::orderBy('id')->paginate(5);
        $this->validate($request, [
            // 'intitule' => 'required',
            'encadrant' => 'required',
            'stagiaire1' => 'required',
        ]);
        // $input = $request->all();
        // dd($input);
        $stage = Stage::create([
            'id_encadrant' => $request->encadrant,
            'id_sujet' => $request->intitule,
            'statut' => 1,

        ]);
        $user1 = User::where('id', '=', $request->stagiaire1)->first();
        // dd($user1);
        $user2 = User::where('id', '=', $request->stagiaire2)->first();
        // dd($user1);
        $user1->id_encadrant = $request->encadrant;
        $user1->save();
        if($user2 !== null){
            $user2->id_encadrant = $request->encadrant;
            $user2->save();
        }
        $sujet = Sujet::where('id', '=', $request->intitule)->first();
        // dd($sujet);
        $sujet->valide = 2;
        $sujet->save();
        
       return redirect()->route('stage.index');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stage = stage::find($id);
        $stage->statut = 2;
        $stage->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $stage = stage::find($id);
        $stage->statut = 3;
        $stage->save();
        return back();
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
    dd($id);
        $stage = stage::find($id);
        $stage->statut = 3;
        $stage->save();
        return back();
        // $id = $request->id;
        // $this->validate($request, [
            // 'intitule' => 'required',
            // 'encadrant' => 'required',
            // 'stagiaire' => 'rrequired',
        // ]);
        // $data = Stage::select()->get();
        //  $input = $request->all();
        //  $stg = Stage::where('id', '=', $id)->first();
        // $stg->id_sujet = $request->intitule;
        // $stg->id_encadrant = $request->encadrant;
        
        // dd($request);
        // $stg->save();
        //  return redirect()->route('stage.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stage::find($id)->delete();
        return redirect()->route('stage.index');
    }
}
