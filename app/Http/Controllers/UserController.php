<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view',User::class);
        $request->validate([
            'key' => 'nullable|string|max:255',
        ]);
        $users = User::where('name','like','%'.$request->key.'%')->paginate(5);
        $userCount = $users->total();
        return view('users.list',compact('users','userCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',User::class);
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();
        $data = $this->userFormData($request);
        User::create($data);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('view',User::class);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update',User::class);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $request->validated();
        $data = $this->userFormData($request);
        $user->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',User::class);
        $user->delete();
        return redirect()->route('user.index');
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
