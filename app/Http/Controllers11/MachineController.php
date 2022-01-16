<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Machine;
use App\Models\Vendor;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $machines = Machine::paginate(50);
        return view('machines.index', compact('machines'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        $vendors = Vendor::get();
        return view('machines.create', compact('categories', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = [];
        $input = $request->all();
        $request->validate([
            'title' => 'required|unique:machines,title',
            'category_id' => 'nullable',
            'vendor_id' => 'nullable|exists:vendors,id',
            'gallery' => 'nullable|array',
            'price' => 'nullable',
            'video' => 'nullable',
            'hs_code' => 'nullable',
        ]);
        if (isset($request->gallery)) {
            foreach ($input['gallery'] as $galleryImg) {
                $ext = $galleryImg->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $galleryImg->move(public_path("media/machines/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        }
        if (isset($request->video)) {
            $video = $input['video'];
            $ext = $video->extension();
            $videoName = uniqid() . "." . $ext;
            $video->move(public_path("media/machines/video"), $videoName);
            $input['video'] = $videoName;
        }
        Machine::create($input);
        return redirect(route('machines.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $machine = Machine::find($id);
        return view('machines.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::find($id);
        $vendors = Vendor::get();
        $categories = Category::whereNull('parent_id')->get();
        return view('machines.edit', compact('machine', 'vendors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $machine = Machine::find($id);
        $input = $request->all();
        $gallery = [];
        $request->validate([
            'title' => 'required|unique:machines,title,' . $machine->id,
            'category_id' => 'nullable',
            'vendor_id' => 'nullable|exists:vendors,id',
            'hs_code' => 'nullable',
        ]);
        if ($request->hasFile('gallery')) {
            if (isset($machine->gallery)) {
                foreach ($machine->gallery as $img) {
                    unlink(public_path("media/machines/images/$img"));
                }
            }
            foreach ($request->gallery as $galleryImg) {
                $ext = $galleryImg->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $galleryImg->move(public_path("media/machines/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        }
        if ($request->hasFile('video')) {
            if (isset($machine->video)) {
                unlink(public_path("media/machines/video/$machine->video"));
                $video = $input['video'];
                $ext = $video->extension();
                $videoName = uniqid() . "." . $ext;
                $video->move(public_path("media/machines/video"), $videoName);
                $input['video'] = $videoName;
            }
        }
        $machine->update($input);
        return redirect(route('machines.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::find($id);
        if (isset($machine->gallery)) {
            foreach ($machine->gallery as $img) {
                unlink(public_path("media/machines/images/$img"));
            }
        }
        if (isset($machine->video)) {
            unlink(public_path("media/machines/video/$machine->video"));
        }
        $machine->delete();
        return redirect(route('machines.index'))->with(['success' => 'delected successfully']);
    }
}
