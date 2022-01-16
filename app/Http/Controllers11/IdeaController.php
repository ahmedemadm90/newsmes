<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ideas = Idea::paginate(50);
        return view('ideas.index', compact('ideas'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ideas.create');
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
            'en_title' => 'required|unique:ideas,en_title',
            'ar_title' => 'required|unique:ideas,ar_title',
        ]);
        Idea::create($input);
        return redirect(route('ideas.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idea = Idea::find($id);
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $idea = Idea::find($id);
        $request->validate([
            'en_title' => 'required|unique:ideas,en_title,'.$idea->id,
            'ar_title' => 'required|unique:ideas,ar_title,'.$idea->id,
        ]);
        $idea->update($input);
        return redirect(route('ideas.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $idea = Idea::find($id);
            $idea->delete();
            return redirect(route('ideas.index'))->with(['error' => 'deleted successfully']);
        } catch (\Throwable $th) {
            return redirect(route('ideas.index'))->with($th);
        }

    }
}
