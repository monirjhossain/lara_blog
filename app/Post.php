<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = ['image'];

    public function user(){
        return $this->belongsTo('App\User'); //user_id
    }

    public function category()
    {
        return $this->belongsTo('App\Category'); //category_id
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class, 'postID', 'id', 'name');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    //define scope
    //published()
    public function scopePublished($query){
        return $query->where('status', 1);
    }

     
}
