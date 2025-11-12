<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'role',
        'short_description',
        'long_description',
        'bio',
        'location',
        'profile_photo',
        'available_for_freelance',
        'cv_file',
        'facebook_link',
        'x_link',
        'linked_link',
        'github_link'
    ];
}
