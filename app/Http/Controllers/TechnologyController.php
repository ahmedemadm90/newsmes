<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $techs = Technology::paginate(50);
        return view('technologies.index',compact('techs'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technologies.create');
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
            'en_title'=>'required|unique:technologies,en_title',
            'ar_title'=> 'required|unique:technologies,ar_title',
        ]);
        Technology::create($input);
        return redirect(route('technologies.index'))->with(['success'=>'created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tech = Technology::find($id);
        return view('technologies.edit',compact('tech'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tech = Technology::find($id);
        $input = $request->all();
        $request->validate([
            'en_title' => 'required|unique:technologies,en_title,'.$tech->id,
            'ar_title' => 'required|unique:technologies,ar_title,'.$tech->id,
        ]);
        $tech->update($input);
        return redirect(route('technologies.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tech = Technology::find($id);
        $tech->delete();
        return redirect(route('technologies.index'))->with(['error' => 'deleted successfully']);
    }
}
