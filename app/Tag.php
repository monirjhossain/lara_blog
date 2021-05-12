<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'postID'];
    public $timestamps = false;
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'postID', 'id');
    }
}
