<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;


use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\User;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:evaluation-list|evaluation-create|evaluation-edit|evaluation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:evaluation-create', ['only' => ['create','store']]);
         $this->middleware('permission:evaluation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:evaluation-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    { 
        $data = Evaluation::orderBy('id')->paginate(5);
        return view('evaluation.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stagiaire = User::where('type_user' ,'=' , 'ST')->get();
     return view('evaluation.create',compact('stagiaire'));
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
            'note'=>'required|numeric|between :0,20',
            'type_evaluation'=>'',
            'remarque' => 'required',
            
        ]);
         Evaluation::create([
            'id_stage'=>$request->id_stage,
            'type_evaluation' => $request->type_evaluation,
            'note' => $request->note,    
            'remarque' =>$request->remarque,
        ]);
              //dd($request);
             return view('evaluation.index',[
                "data"=>Evaluation::all() 
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        $evaluation=evaluation::all();
        return view('sujet.index', compact('sujet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation=Evaluation::all();
        return view('evaluation.index', compact('evaluation'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evaluation::find($id)->delete();
        $data = Evaluation::select()->get();
        return view('evaluation.index', compact('data'));
    }
}
