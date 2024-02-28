<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements=Announcement::all();
        return view("admin.pages.announcements.index",compact('announcements'));
    }

    public function create()
    {
        return view("admin.pages.announcements.create");
    }
    
    public function store(Request $request)
    {
        $name=$request->name;
        $message=$request->message;

        broadcast(new PusherBroadcast($name,$message))->toOthers();
        Announcement::create([
            "name"=> $request->name,
            "content"=>$request->$message,
            "slug"=>Str::slug($request->name)
        ]);

        return redirect()->back()->with("success","Duyuru başarıyla yayınlandı");
    }

    public function show(Announcement $announcement)
    {
        //
    }

    public function edit(Announcement $announcement)
    {
        //
    }

    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    public function destroy(Announcement $announcement)
    {
        //
    }
}
