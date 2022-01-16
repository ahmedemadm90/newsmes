<?php

namespace App\Http\Controllers;

use App\Models\Permission as ModelsPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{



    public function index()
    {
        $permis = Permission::get();
        return view('permissions.index',compact('permis'));
    }
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        $input['guard_name'] = 'web';
        ModelsPermission::create($input);
        return back()->with(['success'=>'Created']);
    }
}
