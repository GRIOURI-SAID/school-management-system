<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{

    protected $fillable=['Name','Node'];
    protected $table = 'Grades';
    public $timestamps = true;

    use HasTranslations;

    public $translatable = ['Name'];

}
