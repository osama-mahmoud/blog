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
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
