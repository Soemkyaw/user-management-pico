<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    // direct role list page
    public function index(Request $request){
        $this->authorize('viewAny',Role::class);

        $roles = Role::where('name','like','%'.$request->key.'%')
                        ->paginate(10);
        return view('role.index',compact('roles'));
    }

    // dirext create page
    public function create(){
        $this->authorize('create',Role::class);

        $features = Feature::get();
        return view('role.create',compact('features'));
    }

    // create
    public function store(Request $request)
    {
        $this->FormValidate($request);
        $data = $this->dbData($request);
        $role = Role::create($data);
        if ($request->has('permissions')) {
            $role->permissions()->attach($request->permissions);
        }
        return redirect()->route('role#index');
    }

    // direct edit page
    public function edit(Role $role)
    {
        $this->authorize('update',Role::class);
        $features = Feature::with('permission')->get();
        return view('role.edit',compact('role','features'));
    }

    // update
    public function update(Role $role,Request $request)
    {
        $this->FormValidate($request);
        $data = $this->dbData($request);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        $role->update($data);
        return redirect()->route('role#index');
    }

    // delete
    public function destory(Role $role){
        $this->authorize('delete',Role::class);
        $role->delete();
        return redirect()->route('role#index');
    }

    //  role form validate
    private function FormValidate($request)
    {
        return $request->validate([
            'name' => ['required'],
        ]);
    }

    // Db data
    private function dbData($request)
    {
        return [
            'name' => $request->name,
        ];
    }
}
