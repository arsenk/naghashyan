<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryData = Category::all()->pluck(
            'name', 
            'id'
        );

        $categoryList = $categoryData->all();

        $list = Product::all();

        return view('product/list', ['data' => $list, 'categoryList' => $categoryList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreProductRequest $request)
    {
        $request->validated();

        Product::create($request->all());

        return redirect()->route('product.index')->with('message', 'Product successful created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product = Product::find($id);

        $categoryData = Category::all()->pluck(
            'name', 
            'id'
        );

        $categoryList = $categoryData->all();

        return view('product/edit', ['data' => $product, 'categoryList' => $categoryList]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, int $id)
    {
        $product = Product::find($id);
        $request->validated();
        $product->fill($request->all());
        $product->save();


        return redirect()->route('product.index')->with('message', 'Product successful updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return redirect()->back()->with('message', 'Something went wrong');
        }
        $product->delete();
        
        return redirect()->back()->with('message', 'Product successful removed');
    }
}
