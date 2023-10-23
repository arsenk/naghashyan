<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::all();

        return view('category/list', ['data' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreCategoryRequest $request)
    {
        $request->validated();

        Category::create($request->all());

        return redirect()->route('category.index')->with('message', 'Category successful created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = Category::find($id);

        return view('category/edit', ['data' => $category]);
    }

    public function update(StoreCategoryRequest $request, int $id)
    {
        $category = Category::find($id);
        $request->validated();
        $category->fill($request->all());
        $category->save();


        return redirect()->route('category.index')->with('message', 'Category successful updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return redirect()->back()->with('message', 'Something went wrong');
        }
        $category->delete();
        
        return redirect()->back()->with('message', 'Category successful removed');
    }
}
