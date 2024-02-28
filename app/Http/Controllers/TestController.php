<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use App\Mail\NewPostMail;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    function test()
    {
        event(new PusherBroadcast("Deneme","Test"));
        print("test sınıfı");
    }
}
