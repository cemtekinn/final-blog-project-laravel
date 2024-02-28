<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{

    public function index()
    {
        $subscribers = Subscriber::all();
        return view("admin.pages.subscribers", compact('subscribers'));
    }

    public function store(SubscribeRequest $request)
    {
        $request = $request->validated();
        $email = $request["email"];
        Subscriber::create([
            "email" => $email
        ]);
        return redirect()->back()->with("success", "Kullanıcı bültene başarıyla eklenmiştir");
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->back()->with("success", "Kullanıcı bültenden başarıyla silindi");
    }
}
