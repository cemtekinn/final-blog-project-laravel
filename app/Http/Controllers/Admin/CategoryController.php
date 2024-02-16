<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\UpdateRequest;
use App\Http\Requests\Categories\StoreRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.categories', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $title = $validatedData['title'];
        $description = $validatedData['description'];
        Category::create([
            'title' => $title,
            'description' => $description,
            'slug' => Str::slug($validatedData['title'])
        ]);
        return redirect()->back()->with("success", "Kategoriler başarıyla eklendi");
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $title = $validatedData['title'];
        $description = $validatedData['description'];
        $category->update([
            'title' => $title,
            'description' => $description,
            'slug' => Str::slug($title)
        ]);
        return redirect()->back()->with("success", "Kategori başarıyla güncellendi");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with("success", "Başarıyla silindi");
    }
}
