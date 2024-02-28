<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Post;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        $subject = "Yeni post: {$this->post->title}";
        return $this->subject("Yeni post paylaşıldı")
            ->view('emails.new-post')
            ->with('post', $this->post);
    }
}
