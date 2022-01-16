<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Machine;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(50);
        return view('categories.index', compact('categories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('categories'));
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
            'en_name' => 'required|string|unique:categories,en_name',
            'ar_name' => 'required|string|unique:categories,ar_name',
            'img' => 'nullable|file|mimes:png,jpg,jpeg,gif',
            'hs_code'=> 'nullable'
        ]);
        $input = $request->all();
        if (isset($request->active)) {
            $input['active'] = '1';
        } else {
            $input['active'] = '0';
        }
        if (isset($request->parent_id)) {
            $request->validate([
                'parent_id' => 'required|exists:categories,id',
            ]);
            $input['parent_id'] = $request->parent_id;
        }
        if (isset($input['img'])) {
            $img = $input['img'];
            $ext = $img->extension();
            $imgname = uniqid() . "." . $ext;
            $input['img'] = $imgname;
            $img->move(public_path("media/categories"), $imgname);
        }
        Category::create($input);
        return redirect(route('categories.index'))->with(['success' => 'Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect(route('categories.index'))->with(['error' => 'Invaled Category']);
        }
        $mecs = Machine::where('category_id', $id)->get();
        return view('categories.show', compact('mecs', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect(route('categories.index'))->with(['error' => 'Invaled Category']);
        }
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect(route('categories.index'))->with(['error' => 'Invaled Category']);
        }
        $request->validate([
            'en_name' => 'required|string|unique:categories,en_name,' . $category->id,
            'ar_name' => 'required|string|unique:categories,ar_name,' . $category->id,
            'img' => 'file|mimes:png,jpg,jpeg,gif',
        ]);
        $input = $request->all();
        if (isset($request->active)) {
            $input['active'] = '1';
        } else {
            $input['active'] = '0';
        }
        if (isset($request->parent_id)) {
            $request->validate([
                'parent_id' => 'required|exists:categories,id',
            ]);
            $input['parent_id'] = $request->parent_id;
        }
        if ($request->hasFile('img')) {
            $img = $input['img'];
            $ext = $img->extension();
            $imgname = uniqid() . "." . $ext;
            $input['img'] = $imgname;
            $img->move(public_path("media/categories"), $imgname);
            if (isset($category->img)) {
                unlink(public_path('media/categories/' . $category->img));
            }
        }
        $category->update($input);
        return redirect(route('categories.index'))->with(['success' => 'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        if (isset($cat->img)) {
            unlink(public_path("media/categories/$cat->img"));
        }
        $cat->delete();
        return redirect(route('categories.index'))->with(['success' => 'Deleted Successfully']);
    }
}
