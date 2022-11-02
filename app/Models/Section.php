<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    protected $fillable=['Name_section','grade_id','class_id'];
    public $timestamps = true;
     use HasTranslations;

    public $translatable = ['Name_section'];



    public function Greades()
    {
        return $this->belongsTo('\app\Models\Grade', 'grade_id');
    }

    public function Classromm()
    {
        return $this->belongsTo('App\Models\Classrom', 'class_id');
    }

       public function teachers()
    {
        return $this->belongsToMany("\App\Models\Teacher", 'teachers_section');
    }


}
