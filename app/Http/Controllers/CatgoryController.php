<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatgoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =category::paginate(10);
        return view('category.index',[
            'categories' =>$categories
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
    
       return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'satus'=>'nullable'
        ]);
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status ==true ? 1:0
        ]);
        return redirect('/category')->with(' status', 'category created succcessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Category::find($id);
        return view('category.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Category::find($id);
        return view('category.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $item = Category::find($id);

    if (!$item) {
        return redirect()->route('category.index')->with('status', 'Category not found');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|boolean',
    ]);

    $item->update([
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status ? 1 : 0,
    ]);

        return redirect()->route('category.index')->with('status', 'Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('status', 'Category deleted successfully.');

    }
}
