<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HsCode;
use App\Models\Machine;
use App\Models\Material;
use App\Models\Project;
use Illuminate\Http\Request;

class HsCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $codes = HsCode::paginate(50);
        return view('hs codes.index',compact('codes'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codes = HsCode::whereNull('parent_id')->get();
        return view('hs codes.create',compact('codes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'details' => 'required',
            'parent_id' => 'nullable',
        ]);
        $code = HsCode::create($request->all());
        //dd($code->id);
        return redirect(route('hscodes.index'))->with(['success'=>'Code Created Successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HsCode  $hsCode
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $code = HsCode::find($id);
        $machines = [];
        $materials = [];
        $projects = [];
        $categories = [];
        foreach (Machine::all() as $machine) {
            if(in_array($code->id,$machine->hs_code)){
                array_push($machines,$machine);
            }
        }
        foreach (Material::all() as $material) {
            if(in_array($code->id, $material->hs_code)){
                array_push($materials, $material);
            }
        }
        foreach (Project::all() as $project) {
            if(in_array($code->id, $project->hs_code)){
                array_push($projects, $project);
            }
        }
        foreach (Category::all() as $category) {
            if(in_array($code->id, $category->hs_code)){
                array_push($categories, $category);
            }
        }
        return view('hs codes.show',compact('categories','machines','projects','materials', 'code'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HsCode  $hsCode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $code = HsCode::find($id);
        $codes = HsCode::whereNull('parent_id')->get();
        return view('hs codes.edit',compact('code', 'codes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HsCode  $hsCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $code = HsCode::find($id);
        $input = $request->all();
        $request->validate([
            'code' => 'required',
            'details' => 'required',
            'parent_id' => 'nullable',
        ]);
        $code->update($input);
        return redirect(route('hscodes.index'))->with(['success'=>'code updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HsCode  $hsCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = HsCode::find($id);
        $code->delete();
        return redirect(route('hscodes.index'))->with(['success' => 'Deleted Successfully']);
    }
}
