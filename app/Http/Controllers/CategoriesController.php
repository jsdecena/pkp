<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.categories.list', array('data' => Categories::paginate(10)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name'      => 'required|unique:categories'
        ]);

        $category               = new Categories;
        $category->name         = $request->input('name');
        $category->slug         = str_slug($request->input('name'));
        $category->cover        = null;
        $category->description  = $request->input('description');
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin.categories.category', array('category' => Categories::findOrFail($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit', array('category' => Categories::findOrFail($id)));
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
            'name' => 'required',
        ]);

        $category               = Categories::find($id);
        $category->name         = $request->input('name');
        $category->slug         = str_slug($request->input('name'));
        $category->cover        = null;
        $category->description  = $request->input('description');
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Successfully deleted!');
    }
}
