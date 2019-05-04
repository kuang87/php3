<?php

namespace Aleksandr\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function posts(){
        return $this->hasMany(Post::class, 'author');
    }
}