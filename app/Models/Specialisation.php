<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Translatable\HasTranslations;

class Specialisation extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable =["Name"];
}
