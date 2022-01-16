<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Idea;
use App\Models\InvestField;
use App\Models\Machine;
use App\Models\Material;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Vendor;
use App\Models\Visit;
use Illuminate\Support\Facades\URL;

class FrontController extends Controller
{
    public function index()
    {
        $bestproject = Project::orderBy('counter', 'desc')->limit(1)->first();
        $topprojects = Project::orderBy('counter', 'desc')->get();
        $projects = Project::orderBy('counter', 'desc')->limit(5)->get();
        $newprojects = Project::orderBy('created_at', 'desc')->limit(5)->get();
        $categories = Category::whereNull('parent_id')->get();
        $machines = Machine::orderBy('counter', 'desc')->limit(5)->get();
        $vendors = Vendor::orderBy('counter', 'desc')->limit(5)->get();
        $materials = Material::all();
        $ideas = Idea::all();
        $fields = InvestField::all();
        $techs = Technology::all();
        return view('front.home', compact(
            'projects',
            'categories',
            'machines',
            'materials',
            'vendors',
            'newprojects',
            'bestproject',
            'topprojects',
            'ideas',
            'fields',
            'techs',
        ));
    }
    public function showmachine(Request $request, $id)
    {
        $machine = Machine::find($id);
        $projects = [];
        $allprojects = Project::all();
        foreach ($allprojects as $project) {
            if (in_array($id, $project->machines_id)) {
                array_push($projects, $project);
            }
        }
        /* Visit Section Start */
        $route = "/machine/$machine->id";
        $ip = Visit::where('ip', $request->ip())->where('route', $route)->first();
        if (!$ip) {
            Visit::create([
                'ip' => $request->ip(),
                'route' => $route,
            ]);
            $counter = $machine->counter = $machine->counter + 1;
            $machine->update([
                'counter' => $counter,
            ]);
            return view('front.machine', compact('machine', 'projects'));
        } else {
            return view('front.machine', compact('machine', 'projects'));
        }
        /* Visit Section End */
    }
    public function showmaterial(Request $request, $id)
    {
        $material = Material::find($id);
        $route = '/material' . $material->id;
        $ip = Visit::where('ip', $request->ip())->where('route', $route)->first();
        if (!$ip) {
            Visit::create([
                'ip' => $request->ip(),
                'route' => $route,
            ]);
            $counter = $material->counter = $material->counter + 1;
            $material->update([
                'counter' => $counter,
            ]);
            return view('front.material', compact('material'));
        } else {
            return view('front.material', compact('material'));
        }
        /* Visit Section End */
    }
    public function showproject(Request $request, $id)
    {
        $project = Project::find($id);
        $machines = [];
        foreach ($project->machines_id as $id) {
            $machine = Machine::find($id);
            if ($machine) {
                array_push($machines, $machine);
            }
        }
        $route = '/project/' . $project->id;
        $ip = Visit::where('ip', $request->ip())->where('route', $route)->first();
        if (!$ip) {
            Visit::create([
                'ip' => $request->ip(),
                'route' => $route,
            ]);
            $counter = $project->counter = $project->counter + 1;
            $project->update([
                'counter' => $counter,
            ]);
            return view('front.project', compact('project', 'machines'));
        } else {
            return view('front.project', compact('project', 'machines'));
        }
    }
    public function showcategory(Request $request, $id)
    {
        $category = Category::find($id);
        $projectsAll = Project::get();
        $projects = [];
        foreach ($projectsAll as $project) {
            if (in_array($category->id, $project->categories_id)) {
                array_push($projects, $project);
            }
        }
        $machines = Machine::where('category_id', $category->id)->get();
        $route = '/category/' . $category->id;
        $ip = Visit::where('ip', $request->ip())->where('route', $route)->first();
        if (!$ip) {
            Visit::create([
                'ip' => $request->ip(),
                'route' => $route,
            ]);
            $counter = $category->counter = $category->counter + 1;
            $category->update([
                'counter' => $counter,
            ]);
            return view('front.category', compact('category', 'machines', 'projects'));
        } else {
            return view('front.category', compact('category', 'machines', 'projects'));
        }
    }
}
