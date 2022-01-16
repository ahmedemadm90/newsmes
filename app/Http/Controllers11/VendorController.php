<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vendors = Vendor::paginate(25);
        return view('vendors.index', compact('vendors'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');
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
            'name' => 'required|string|max:125',
            'mobile' => 'nullable|string|max:125|unique:vendors,mobile',
            'address' => 'nullable|string|max:125',
            'owner_name' => 'nullable|string|max:125',
            'owner_mobile' => 'nullable|string|max:125|unique:vendors,owner_mobile',
            'tax_record' => 'nullable|string|max:125|unique:vendors,tax_record',
            'active' => 'nullable|in:0,1'
        ]);
        if (!isset($input['mobile'])) {
            $input['mobile'] = 'Not Available';
        }
        if (!isset($input['address'])) {
            $input['address'] = 'Not Available';
        }
        if (!isset($input['owner_name'])) {
            $input['owner_name'] = 'Not Available';
        }
        if (!isset($input['owner_mobile'])) {
            $input['owner_mobile'] = 'Not Available';
        }
        if (!isset($input['tax_record'])) {
            $input['tax_record'] = 'Not Available';
        }
        if (!isset($input['active'])) {
            $input['active'] = '0';
        } else {
            $input['active'] = '1';
        }
        //dd($input);
        Vendor::create($input);
        return redirect()->route('vendors.index')->with(['success' => 'created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            return redirect(route('vendors.index'))->with(['error' => 'invalid vendor']);
        }
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $vendor = Vendor::find($id);
        $request->validate([
            'name' => 'required|string|max:125',
            'mobile' => 'required|string|max:125|unique:vendors,mobile,' . $vendor->id,
            'address' => 'required|string|max:125',
            'owner_name' => 'required|string|max:125',
            'owner_mobile' => 'required|string|max:125|unique:vendors,owner_mobile,' . $vendor->id,
            'tax_record' => 'required|string|max:125|unique:vendors,tax_record,' . $vendor->id
        ]);
        if (!isset($input['active'])) {
            $input['active'] = '0';
        } else {
            $input['active'] = '1';
        }
        //dd($input);
        $vendor->update($input);
        return redirect()->route('vendors.index')->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect(route('vendors.index'))->with(['error' => 'vendor removed successfully']);
    }
}
