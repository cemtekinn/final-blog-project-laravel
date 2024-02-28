<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewPostMail;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    function test()
    {
        Subscriber::all()->each(function ($subscriber) {
            $message = (new NewPostMail($this->post))->onConnection('database')->onQueue('emails');
            Mail::to($subscriber->email)->queue($message);
        });
    }
}
