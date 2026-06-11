<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $fillable = [
        'name',
        'headline',
        'about',
        'email',
        'phone',
        'location',
        'photo',
        'cv_file',
    ];
}
