<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // direct user list
    public function index(Request $request){
        $this->authorize('viewAny',User::class);
        $users = User::where('name','like','%'.$request->key.'%')
                        ->paginate(5);
        return view('users.list',compact('users'));
    }

    // show user profile
    public function show(User $user)
    {
        $this->authorize('view',User::class);
        return view('users.show',compact('user'));
    }

    // direct user create page
    public function create()
    {

        $this->authorize('create',User::class);
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    // store user-form in db
    public function store(Request $request)
    {
        $this->userFormValidate($request);
        $data = $this->userFormData($request);
        User::create($data);
        return redirect()->route('user#index');
    }

    // direct to edit page
    public function edit(User $user)
    {
        $this->authorize('update',User::class);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    // update
    public function update(User $user,Request $request)
    {
        $this->userFormValidate($request);
        $data = $this->userFormData($request);
        $user->update($data);

        return redirect()->route('user#index');
    }

    // delete user
    public function destory(User $user){
        // dd($user)
        $this->authorize('delete',User::class);
        $user->delete();
        return redirect()->route('user#index');
    }

    // user form validate
    private function userFormValidate($request)
    {
        return $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'role_id' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'password' => ['required'],
            'gender' => ['required'],
        ]);
    }

    // user form data
    private function userFormData($request)
    {
        return [
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'is_active' => $request->is_active == 'on' ? true : false,
        ];
    }
}
