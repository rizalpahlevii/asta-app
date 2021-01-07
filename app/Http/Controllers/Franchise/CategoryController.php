<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.franchise.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['franchise_id' => auth()->user()->franchise->id]);
        $validated = $request->validate(['name' => 'required|min:3', 'franchise_id' => 'required']);
        $category = new Category();
        $category->create($validated);
        Flashdata::success_alert("Success to create category");
        return redirect(route('franchise.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.franchise.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(['name' => 'required|min:3']);
        $category =  Category::find($id);
        $category->update($validated);
        Flashdata::success_alert("Success to update category");
        return redirect(route('franchise.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Flashdata::success_alert("Success to delete category");
        return redirect(route('franchise.category.index'));
    }
}
