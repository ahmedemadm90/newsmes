<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /* public function search(Request $request)
    {
        $projects = [];
        $allprojects = Project::all();
        if (isset($request['keyword'])) {
            foreach ($allprojects as $project) {
                if (strpos($project->title, $request->keyword) !== false) {
                    array_push($projects, $project);                }
                if (in_array($request->category_id, $project->categories_id)) {
                    array_push($projects, $project);
                }
                if (isset($request->idea_id)) {
                    $idea_id = $request->idea_id;
                    if($project->idea_id == $idea_id){
                        array_push($projects, $project);
                    }
                }
                if (isset($request->tech_id)) {
                    $tech_id = $request->tech_id;
                    if($project->tech_id == $tech_id){
                        array_push($projects, $project);
                    }
                }
                if (isset($request->field_id)) {
                    $field_id = $request->field_id;
                    if($project->field_id == $field_id){
                        array_push($projects, $project);
                    }
                }
                if (isset($request->emps)) {
                    $emps = $request->emps;
                    if($project->emps <= $emps){
                        array_push($projects, $project);
                    }
                }
                if (isset($request->space)) {
                    $space = $request->space;
                    if($project->space <= $space){
                        array_push($projects, $project);
                    }
                }
                if (isset($request->startup_cost)) {
                    $startup_cost = $request->startup_cost;
                    if($project->startup_cost <= $startup_cost){
                        array_push($projects, $project);
                    }
                }
                foreach ($request->all() as $key => $value) {
                    if (isset($value)) {
                        $keys = [];
                        array_push($keys,$key);
                    }
                }
                foreach ($allprojects as $project) {
                    $project = Project::select(array_values($keys))->get();
                    dd($project);
                }
            }
        }
    } */
    public function search(Request $request, $query = null)
    {
        $query = DB::table('projects');
        /* if ($request->category_id){
            $query->statement('select * from projects where categories_id IN'.$request->category_id);
        } */
        if ($request->keyword){
            $query->where('title', 'like','%'. $request->keyword.'%');
        }
        if($request->emps){
            $query->where('emps','<=',$request->emps);
        }
        if ($request->idea_id) {
            $query->where('idea_id', $request->idea_id);
        }
        if ($request->field_id) {
            $query->where('field_id', $request->field_id);
        }
        if ($request->tech_id) {
            $query->where('tech_id', $request->tech_id);
        }
        if($request->emps){
            $query->where('emps','<=',$request->emps);
        }
        if($request->space){
            $query->where('space','<=',$request->space);
        }
        if($request->startup_cost){
            $query->where('startup_cost','<=',$request->startup_cost);
        }

        $result = $query->get();
        return view('front.searchresult',compact('result'));

    }
}
