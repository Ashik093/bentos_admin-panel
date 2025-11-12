<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialLink extends Model
{
    use HasFactory;
    protected $fillable = ['icon',
    'link',
    'name'];
    protected function icon(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => URL::to($value),
        );
    }
}
