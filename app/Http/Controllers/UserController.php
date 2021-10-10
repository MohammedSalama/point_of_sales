<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:المستخدمين|قائمة المستخدمين', ['only' => ['index']]);
        $this->middleware('role_or_permission:اضافة مستخدم', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:تعديل مستخدم', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:حذف مستخدم', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = User::orderBy('id','DESC')->get();
        return view('backend.users.show_users',compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.Add_user',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $user = User::create(['name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_name' => $request->roles,
        ]);

        $user->assignRole($request->input('roles'));
        session()->flash('Add', 'تم اضافة المستخدم بنجاح');
        return redirect('users');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('backend.users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        else{
            Arr::except($input,array('password'));

        }

        $user = User::find($id);

        $user->update(['name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_name' => $request->roles,
        ]);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        session()->flash('Edit', 'تم تعديل المستخدم بنجاح');
        return redirect('users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('Deleted', 'تم حذف المستخدم بنجاح');
        return redirect('users');

    }

}