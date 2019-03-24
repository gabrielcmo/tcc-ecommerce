<?php

namespace Doomus\Http\Controllers;

use Doomus\Models\Category;
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
        return Category::all()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Doomus\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return Product::where('id_category', $category->id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Doomus\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $c = Category::find($category->id);
        $c->delete();
        return;
    }
}
