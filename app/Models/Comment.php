<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function posts(){
        return $this->belongsTo(Post::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
