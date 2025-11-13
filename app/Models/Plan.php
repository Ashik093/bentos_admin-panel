<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subtitle',
        'price',
        'per',
        'features',
        'is_popular',
        'button_label',
    ];


}
