<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Material;
use App\Models\Vendor;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materials = Material::paginate(50);
        return view('materials.index', compact('materials'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machines = Machine::get();
        $vendors = Vendor::all();
        return view('materials.create', compact('machines', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $machines = [];
        $gallery = [];
        $input = $request->all();
        $request->validate([
            'name' => 'required',
            'vendor_id' => 'nullable|exists:vendors,id',
            'machines_id' => 'nullable',
            'machines_id*' => 'exists:machines,id',
            'gallery' => 'nullable|array',
            'video' => 'nullable',
        ]);
        if (isset($input['machines_id'])) {
            foreach ($input['machines_id'] as $id) {
                array_push($machines, $id);
            }
        }

        if (isset($request->gallery)) {
            foreach ($input['gallery'] as $galleryImg) {
                $ext = $galleryImg->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $galleryImg->move(public_path("media/materials/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        }
        if (isset($request->video)) {
            $video = $input['video'];
            $ext = $video->extension();
            $videoName = uniqid() . "." . $ext;
            $video->move(public_path("media/materials/video"), $videoName);
            $input['video'] = $videoName;
        }
        $input['machines_id'] = $machines;

        Material::create($input);
        return redirect(route('materials.index'))->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        $machines = Machine::get();
        $vendors = Vendor::get();
        return view('materials.edit', compact('material', 'machines', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $machines = [];
        $gallery = [];
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'vendor_id' => 'nullable|exists:vendors,id',
            'machines_id' => 'nullable',
            'machines_id*' => 'exists:machines,id',
        ]);
        if (isset($input['machines_id'])) {
            foreach ($input['machines_id'] as $id) {
                array_push($machines, $id);
            }
        } else {
            $input['machines_id'] = NULL;
            //dd($input['machines_id']);
        }
        if ($request->hasFile('gallery')) {
            if (isset($material->gallery)) {
                foreach ($material->gallery as $img) {
                    unlink(public_path("media/materials/images/$img"));
                }
            }
            foreach ($request->gallery as $galleryImg) {
                $ext = $galleryImg->extension();
                $imageName = uniqid() . "." . $ext;
                array_push($gallery, $imageName);
                $galleryImg->move(public_path("media/materials/images"), $imageName);
            }
            $input['gallery'] = $gallery;
        }
        if ($request->hasFile('video')) {
            if (isset($material->video)) {
                unlink(public_path("media/materials/video/$material->video"));
            }
            $video = $input['video'];
            $ext = $video->extension();
            $videoName = uniqid() . "." . $ext;
            $video->move(public_path("media/materials/video"), $videoName);
            $input['video'] = $videoName;
        }
        if (!isset($input['hs_code'])) {
            $input['hs_code'] = Null;
        }
        $material->update($input);

        return redirect(route('materials.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        if (isset($material->gallery)) {
            foreach ($material->gallery as $img) {
                unlink(public_path("media/materials/images/$img"));
            }
        }
        if (isset($material->video)) {
            unlink(public_path("media/materials/video/$material->video"));
        }
        $material->delete();
        return redirect(route('materials.index'))->with(['error' => 'Deleted Successfully']);
    }
}
