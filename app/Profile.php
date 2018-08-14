<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Determining the reverse relationship
    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id', 'avatar', 'youtube', 'facebook', 'about'];
}
