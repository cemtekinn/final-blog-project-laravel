<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['title','description','content','slug','image','user_id'];
    public function categories()
    {
        $this->belongsToMany(Category::class);
    }
    public function tags()
    {
        $this->belongsToMany(Tag::class);
    }
}
