<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = ['image'];

    public function user(){
        return $this->belongsTo(User::class); //user_id
    }

    public function category()
    {
        return $this->belongsTo(Category::class); //category_id
    }
}
