<?php

namespace Aleksandr\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'author');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}