<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Make the tag field fillable
    protected $fillable = ['tag'];
    // Name for the relationship
    public function posts(){
        return $this->belongsToMany('App\Posts');
    }
}
