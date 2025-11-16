<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;

class NewsLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'thumbnail',
        'newspaper_name',
        'published_at'
    ];
     protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => URL::to($value),
        );
    }
}
