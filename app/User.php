<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','role_id','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
    

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }

    //Many To Many Relationship
    
    public function likedPosts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
