<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    // dirext create page
    public function create(){
        return view('role.create');
    }

    // store in db
    public function store(Request $request)
    {
        $this->FormValidate($request);
        dd($request->name);
    }

    // Vadilate role form
    private function FormValidate($request)
    {
        return $request->validate([
            'name' => ['required'],
        ]);
    }
}
