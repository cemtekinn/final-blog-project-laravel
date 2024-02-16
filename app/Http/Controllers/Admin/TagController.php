<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreRequest;
use App\Http\Requests\Tags\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function index()
    {
        $tags=Tag::all();
        return view("admin.pages.tags",compact("tags"));
    }

    public function store(StoreRequest $request)
    {
        $validatedData=$request->validated();
        $title=$validatedData['title'];
        Tag::create([
            'title'=>$title,
            'slug'=>Str::slug($title)
        ]);
        return redirect()->back()->with("success","Etiket başarıyla eklendi");
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $validatedData=$request->validated();
        $title=$validatedData['title'];
        $tag->update([
            'title'=>$title,
            'slug'=>Str::slug($title)
        ]);
        return redirect()->back()->with("success","Etiket başarıyla güncellendi");
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with("succes","Başarıyla silindi");
    }
}
