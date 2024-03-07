<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',Role::class);
        $request->validate([
            'key' => 'nullable|string|max:255',
        ]);
        $roles = Role::where('name','like','%'.$request->key.'%')
                        ->paginate(10);
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Role::class);

        $features = Feature::get();
        return view('role.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $role = Role::create($data);
        if ($request->has('permissions')) {
            $role->permissions()->attach($request->permissions);
        }
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $this->authorize('update',Role::class);
        $features = Feature::with('permission')->get();
        return view('role.edit',compact('role','features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request,Role $role)
    {
        $data = $request->validated();

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        $role->update($data);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete',Role::class);
        $role->delete();
        return redirect()->route('role.index');
    }
}
