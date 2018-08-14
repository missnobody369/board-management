<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    // Set fillable fields
    protected $fillable =  ['site_name', 'address', 'contact_number', 'contact_email'];
}
