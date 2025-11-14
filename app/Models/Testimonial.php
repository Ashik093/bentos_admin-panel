<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;
class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_position',
        'message',
        'photo',
    ];
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => URL::to($value),
        );
    }
}
