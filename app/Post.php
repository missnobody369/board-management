<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Set up reverse relationship for the post table
    // A post can only belong on 1 category
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
