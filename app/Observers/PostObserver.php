<?php

namespace App\Observers;

use App\Models\Post;
use App\Jobs\SendEmailJob;

class PostObserver
{
    public function created(Post $post): void
    {
        SendEmailJob::dispatch($post);
    }
}
