<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classrom extends Model
{ use HasTranslations;

    public $translatable = ['Name_class'];

    protected $table = 'Classroms';
    public $timestamps = true;

    protected $fillable=['Name_class','grade_id'];

    public function Grades()
    {
        return $this->belongsTo('\app\Models\Grade', 'grade_id');
    }



}
