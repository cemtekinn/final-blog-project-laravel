<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StoreRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostConroller extends Controller
{
    public function index()
    {
        $posts=Post::all();
        return view('admin.pages.posts.index',compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags=Tag::all();
        return view('admin.pages.posts.create',compact('categories','tags'));
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $imageName="";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->storeAs('public/images/blog', $imageName);
        }

        $post = Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'description'=>$validatedData['description'],
//            'user_id' => auth()->id(),
            'slug' => Str::slug($validatedData['title']),
            'image'=>$imageName
        ]);

        $post->categories()->attach($validatedData['categories']);
        $post->tags()->attach($validatedData['tags']);
        return redirect()->route('posts.create')->with('success', 'Post başarıyla oluşturuldu');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $validatedData = $request->validated();
        $post->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'description'=>$validatedData['description'],
           // 'user_id' => auth()->id(),
            'slug' => Str::slug($validatedData['title'])
        ]);
        $post->categories()->sync($validatedData['categories']);
        $post->tags()->sync($validatedData['tags']);
        return redirect()->route('posts.edit', $post)->with('success', 'Post başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $imagePath = Storage::path('public/images/blog/'. $post->image);
        unlink($imagePath);
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        return redirect()->back()->with('success', 'Post başarıyla silindi');
    }
}
