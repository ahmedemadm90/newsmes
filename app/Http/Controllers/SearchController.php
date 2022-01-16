<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function basic_search(Request $request)
    {
        $query = DB::table('projects');
        /* if ($request->category_id) {
            $array = $request->category_id;
            dd($request->category_id);
            $query->whereIn('categories_id', array_values($array) );
        } */
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $result = $query->get();
        //dd($result);
        return view('front.search result',compact('result'));

    }
    public function search(Request $request, $query = null)
    {
        $query = DB::table('projects');
        /* if ($request->category_id){
            $query->whereIn($request->category_id, 'categories_id');
        } */
        if (!empty($request->keyword)){
            $query->where('title', 'like','%'. $request->keyword.'%');
        }
        if(!empty($request->emps)){
            $query->where('emps','<=',$request->emps);
        }
        if (!empty($request->idea_id) ){
            $query->where('idea_id', $request->idea_id);
        }
        if (!empty($request->field_id) ){
            $query->where('field_id', $request->field_id);
        }
        if (!empty($request->tech_id) ){
            $query->where('tech_id', $request->tech_id);
        }
        if(!empty($request->emps)){
            $query->where('emps','<=',$request->emps);
        }
        if(!empty($request->space)){
            $query->where('space','<=',$request->space);
        }
        if(!empty($request->startup_cost)){
            $query->where('startup_cost','<=',$request->startup_cost);
        }
        $result = $query->get();
        return view('front.search result', compact('result'));
    }
}
