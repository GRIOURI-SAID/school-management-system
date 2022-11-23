<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];



      public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

      public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }



      public function classroom()
    {
        return $this->belongsTo('App\Models\Classrom', 'Classroom_id');
    }

      public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function Nationality(){
        return $this->belongsTo("App\Models\Nationalite" , "nationalitie_id");
    }


    public function myparent(){
        return $this->belongsTo("App\Models\My_Parent" , "parent_id");
    }

    public  function  attendance (){
          return $this->hasMany("App\Models\Attendance" , "student_id");
    }

}
