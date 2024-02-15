<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.pages.categories',compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        $validatedData=$request->validated();

        $title=$validatedData['title'];
        $description=$validatedData['description'];
        Category::create([
            'title'=>$title,
            'description'=>$description,
            'slug'=>Str::slug($validatedData['title'])
        ]);
        return redirect()->back()->with("success","Kategoriler başarıyla eklendi");
    }

    public function show(Category $category)
    {
        //
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $validatedData=$request->validated();
        $title=$validatedData['title'];
        $description=$validatedData['description'];

        $category->update([
            'title'=>$title,
            'description'=>$description,
            'slug'=>Str::slug($title)
        ]);
        return redirect()->back()->with("success","Kategori başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
