<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasTranslations;

    public $translatable= ["name"];

    protected  $guarded =[];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classrom', 'classroom_id');
    }

    public  function  teacher(){
        return $this->belongsTo('App\Models\Teacher' , "teacher_id");
    }

    public  function  section(){
        return $this->belongsTo('App\Models\Section' , "section_id");
    }



}
