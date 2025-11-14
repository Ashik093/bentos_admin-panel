<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\URL;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'logo', 'website'];
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => URL::to($value),
        );
    }
}
