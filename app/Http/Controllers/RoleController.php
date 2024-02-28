<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // direct role list page
    public function index(){
        $roles = Role::all();
        return view('role.index',compact('roles'));
    }

    // dirext create page
    public function create(){
        return view('role.create');
    }

    // store in db
    public function store(Request $request)
    {
        $this->FormValidate($request);
        $data = $this->dbData($request);
        Role::create($data);
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
