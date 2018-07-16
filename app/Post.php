<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    // For Mass Assignment
    protected $fillable = [
        'title','content','category_id','featured','slug'
    ];

    // Assigning/Set up  Assesors
    public function getFeaturedAttribute($featured) {
        return asset($featured);
    }

    protected $dates = ['deleted_at']; // Declare new dates to include in the application

    // Set up reverse relationship for the post table
    // A post can only belong on 1 category
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
