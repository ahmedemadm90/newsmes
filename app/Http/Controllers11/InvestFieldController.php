<?php

namespace App\Http\Controllers;

use App\Models\InvestField;
use Illuminate\Http\Request;

class InvestFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $investfields = InvestField::paginate(50);
        return view('investfields.index',compact('investfields'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investfields.create');
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
            'en_title' => 'required|unique:invest_fields,en_title',
            'ar_title' => 'required|unique:invest_fields,ar_title',
        ]);
        InvestField::create($input);
        return redirect(route('investfields.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvestField  $investField
     * @return \Illuminate\Http\Response
     */
    public function show(InvestField $investField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvestField  $investField
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investfield = InvestField::find($id);
        return view('investfields.edit',compact('investfield'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvestField  $investField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investfield = InvestField::find($id);
        $input = $request->all();
        $request->validate([
            'en_title' => 'required|unique:invest_fields,en_title,'.$investfield->id,
            'ar_title' => 'required|unique:invest_fields,ar_title,'.$investfield->id,
        ]);
        $investfield->update($input);
        return redirect(route('investfields.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvestField  $investField
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investfield = InvestField::find($id);
        $investfield->delete();
        return redirect(route('investfields.index'))->with(['error' => 'deleted successfully']);
    }
}
