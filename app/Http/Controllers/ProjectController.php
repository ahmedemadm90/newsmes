<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idea;
use App\Models\InvestField;
use App\Models\Machine;
use App\Models\Project;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::paginate(50);
        return view('projects.index', compact('projects'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        $machines = Machine::get();
        $investfields = InvestField::get();
        $ideas = Idea::get();
        $techs = Technology::get();
        $users = User::get();
        return view('projects.create', compact('categories', 'machines', 'investfields', 'ideas', 'techs', 'users'));
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
        $gallery = [];
        $request->validate([
            'title' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'categories_id' => 'nullable',
            'categories_id*' => 'exists:categories,id',
            'machines_id' => 'nullable',
            'machines_id*' => 'exists:machines,id',
            'materials_id' => 'nullable',
            'materials_id*' => 'exists:materials,id',
            'field_id' => 'nullable',
            'startup_cost' => 'nullable',
            'space' => 'nullable',
            'emps' => 'nullable',
            'free_space1' => 'nullable',
            'free_space2' => 'nullable',
            'free_space3' => 'nullable',
            'gallery' => 'nullable|array',
            'video' => 'nullable',
        ]);
        if (isset($request->gallery)) {
            foreach ($input['gallery'] as $galleryImg) {
                $ext = $galleryImg->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $galleryImg->move(public_path("media/projects/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        }
        if (isset($request->video)) {
            $video = $input['video'];
            $ext = $video->extension();
            $videoName = uniqid() . "." . $ext;
            $video->move(public_path("media/projects/video"), $videoName);
            $input['video'] = $videoName;
        }
        if (auth()->user()->parent_user != Null) {
            $input['user_id'] = auth()->user()->parent_user;
        } else {
            $input['user_id'] = auth()->user()->id;
        }

        Project::create($input);
        return redirect(route('projects.index'))->with(['success' => 'new project created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::whereNull('parent_id')->get();
        $machines = Machine::get();
        $investfields = InvestField::get();
        $ideas = Idea::get();
        $techs = Technology::get();
        $users = User::get();
        $project = Project::find($id);
        return view('projects.edit', compact('project', 'categories', 'machines', 'investfields', 'ideas', 'techs', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $input = $request->all();
        $gallery = [];
        $request->validate([
            'title' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            'categories_id' => 'nullable',
            'categories_id*' => 'exists:categories,id',
            'machines_id' => 'nullable',
            'machines_id*' => 'exists:machines,id',
            'materials_id' => 'nullable',
            'materials_id*' => 'exists:materials,id',
            'idea_id' => 'nullable|exists:ideas,id',
            'tech_id' => 'nullable|exists:technologies,id',
            'field_id' => 'nullable',
            'startup_cost' => 'nullable',
            'space' => 'nullable',
            'emps' => 'nullable',
            'free_space1' => 'nullable|string',
            'free_space2' => 'nullable|string',
            'free_space3' => 'nullable|string',
            'gallery' => 'nullable|array',
            'video' => 'nullable',
        ]);
        if ($request->hasFile('gallery')) {
            if (isset($project->gallery)) {
                foreach ($project->gallery as $img) {
                    unlink(public_path("media/projects/images/$img"));
                }
            }
            foreach ($request->gallery as $galleryImg) {
                $ext = $galleryImg->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $galleryImg->move(public_path("media/projects/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        }
        if ($request->hasFile('video')) {
            if (isset($project->video)) {
                unlink(public_path("media/projects/video/$project->video"));
            }
            $video = $request->video;
            $ext = $video->extension();
            $videoName = uniqid() . "." . $ext;
            $video->move(public_path("media/projects/video"), $videoName);
            $input['video'] = $videoName;
        }
        if (!isset($input['hs_code'])) {
            $input['hs_code'] = Null;
        }
        if (!isset($input['machines_id'])) {
            $input['machines_id'] = Null;
        }
        if (!isset($input['materials_id'])) {
            $input['materials_id'] = Null;
        }
        //dd($input);
        $project->update($input);
        return redirect(route('projects.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (isset($project->gallery)) {
            foreach ($project->gallery as $img) {
                unlink(public_path("media/projects/images/$img"));
            }
        }
        if (isset($project->video)) {
            unlink(public_path("media/projects/video/$project->video"));
        }
        $project->delete();
        return redirect(route('projects.index'))->with(['success' => 'deleted successfully']);
    }
}
