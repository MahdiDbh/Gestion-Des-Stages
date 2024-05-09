<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->roles[0] );
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->username=$request->name;
        if($request->roles[0] == 'Stagiaire') $user->type_user = 'ST';
        if($request->roles[0] == 'Admin') $user->type_user = 'AD';
        if($request->roles[0] == 'Encadrant') $user->type_user = 'EN';
        if($request->roles[0] == 'Chargé de formation') $user->type_user = 'CF';
        $user->save();
        $user->assignRole($request->input('roles'));
        // activity()
        // ->causedBy(auth()->user())
        // ->log('Ajouter un utilisateur');
        return redirect()->route('users.index')
                        ->with('success','Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            // dd($id);
         // $log=DB::table('activity_log')->select('description','created_at')->where('causer_id','=',$id)->get();
        $log = ActivityLog::where('causer_id', $id)->get();
        // dd($log);
         $user = User::find($id);
        return view('users.show',compact('user','log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        $user->username = $request->name;
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        if($request->roles[0] == 'Stagiaire') $user->type_user = 'ST';
        if($request->roles[0] == 'Admin') $user->type_user = 'AD';
        if($request->roles[0] == 'Encadrant') $user->type_user = 'EN';
        if($request->roles[0] == 'Chargé de formation') $user->type_user = 'CF';
        $user->save();

        $user->assignRole($request->input('roles'));
        // dd($user->hasPermissionTo('user-list'));
        // activity()
        // ->causedBy(auth()->user())
        // ->log('Modifier un utilisateur');
        return redirect()->route('users.index')
                        ->with('success','Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        // activity()
        // ->causedBy(auth()->user())
        // ->log('Supprimer un utilisateur');
        return redirect()->route('users.index')
                        ->with('success','Utilisateur supprimé avec succès.');
    }
}
