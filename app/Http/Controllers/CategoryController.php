<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
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
        $this->validate($request,[
            'name' => 'string',
        ]);
        
        $category = Category::create(['name' => $request->name]);
        if ($category) {
            flash('Berhasil menambahkan category')->success();
        }else{
            flash('Gagal menambahkan category')->danger();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        $categories = Category::all();
        $category = Category::find($category->id);
        return view('category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::find($category->id);
        $category->name = $request->name;
        $category->save();

        flash('Category berhasil diupdate');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ( count( $category->taskDetail) > 0) {
            // flash('Category tidak bisa dihapus karena sedang digunakan')->warning();
            Alert::warning('Category tidak bisa dihapus karena sedang digunakan')->autoclose(3000);
            return redirect()->route('category.index');
        }else{
            Category::find($category->id)->delete();
            flash('Category berhasil dihapus')->success();
            return redirect()->route('category.index');
        }
    }

    
}
