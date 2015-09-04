<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use App\Models\Categories;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.suppliers.list', array('data' => Suppliers::paginate(10)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.suppliers.create', array('categories' => Categories::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:suppliers',
            'mobile'    => 'required|integer|min:10',
        ]);

        $supplier               = new Suppliers;
        $supplier->category_id  = $request->input('category');
        $supplier->name         = $request->input('name');
        $supplier->slug         = str_slug($request->input('name'));
        $supplier->email        = $request->input('email');
        $supplier->mobile       = $request->input('mobile');
        $supplier->description  = $request->input('description');
        $supplier->website      = $request->input('website');
        $supplier->contact      = $request->input('contact');
        if ($request->hasFile('file')) {
            //COVER PHOTO
            $fileName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move("uploads", "$fileName");

            $supplier->cover    = $fileName;
        }
        $supplier->telephone    = $request->input('telephone');
        $supplier->address      = $request->input('address');
        $supplier->latitude     = $request->input('latitude');
        $supplier->longitude    = $request->input('longitude');
        $supplier->status       = $request->input('status');
        $supplier->created_at   = date('m-d-y H:i:s');
        $supplier->updated_at   = date('m-d-y H:i:s');
        $supplier->save();

        return redirect()->route('admin.suppliers.index')->with('success', 'Successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.suppliers.edit', array('categories' => Categories::all(), 'supplier' => Suppliers::findOrFail($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required|integer|min:10',
        ]);

        $supplier               = Suppliers::findOrFail($id);
        $supplier->category_id  = $request->input('category');
        $supplier->name         = $request->input('name');
        $supplier->slug         = str_slug($request->input('name'));
        $supplier->email        = $request->input('email');
        $supplier->mobile       = $request->input('mobile');
        $supplier->description  = $request->input('description');
        $supplier->website      = $request->input('website');
        $supplier->contact      = $request->input('contact');
        if ($request->hasFile('file')) {
            //COVER PHOTO
            $fileName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move("uploads", "$fileName");

            $supplier->cover    = $fileName;
        }
        $supplier->telephone    = $request->input('telephone');
        $supplier->address      = $request->input('address');
        $supplier->latitude     = $request->input('latitude');
        $supplier->longitude    = $request->input('longitude');
        $supplier->status       = $request->input('status');
        $supplier->updated_at   = date('m-d-y H:i:s');
        $supplier->save();

        return redirect()->route('admin.suppliers.edit', $id)->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::findOrFail($id);
        $supplier->delete();

        return redirect()->route('admin.suppliers.index')->with('success', 'Successfully deleted!');
    }
}
