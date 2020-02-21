<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id', 'category_id', 'title','content','image',
    ];

    public function category(){
          return $this->belongsTo(Category::class,'category_id');
    }
    public function user(){
          return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
          return $this->hasMany(Comment::class,'post_id');
    }
    public function tags(){
          return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }
}
