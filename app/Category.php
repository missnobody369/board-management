<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Setting up a relationship method
    public function posts() {
        // Descriptive about the relationship
        return $this->hasMany('App\Post'); // Relationship with the Post table
    }
}
