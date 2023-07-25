<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $guard_name = 'web';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('permission:users.index|users.edit|users.create|users.destroy')->only('index');
        // $this->middleware('permission:crear-blog')->only('create', 'store');
        // $this->middleware('permission:editar-blog', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:eliminar-blog', ['only' => ['destroy']]);
        $this->middleware('role:admin');
    }
    
    public function index()
    {
        //User::all(5);
        $users = User::paginate(5);
        return view('users.index',compact('users'));
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
    //    dd($request);

        $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8|same:password-confirm',
            'roles' => 'required'
        ]);
        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        $user->assignRole($request->input('roles'));

        return redirect()->route('user.index');
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
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        
        return view('users.edit',compact('user','roles','userRoles'));
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
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8|same:password-confirm',
            'roles' => 'required'
        ]);
        $inputs = $request->all();
        
        if(!empty($inputs['password'])){
            $inputs['password'] = Hash::make($inputs['password']);
        }else{
            $inputs = Arr::except($inputs,array('password'));
        }

        $user->update($inputs);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        //$user->roles->delete();
        return redirect()->route('user.index');

    }


}
