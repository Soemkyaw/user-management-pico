<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // direct user list
    public function index(){
        $users = User::all();
        return view('users.list',compact('users'));
    }

    // direct user create page
    public function create()
    {
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

    // user form validate
    private function userFormValidate($request)
    {
        return $request->validate([
            'firstName' => ['required'],
            'secondName' => ['required'],
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
            'name' => $request->firstName.' '.$request->secondName,
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
