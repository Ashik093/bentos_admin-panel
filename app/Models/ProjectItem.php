<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectItem extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','is_left','title','description','extra_description','image'];
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => URL::to($value),
        );
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
