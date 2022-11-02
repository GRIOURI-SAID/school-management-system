<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Teacher extends Model
{
     use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];

    public function genders(){

        return $this->belongsTo('\App\Models\Gender' , "gender_id");
    }

    public function specializations(){

        return $this->belongsTo('\App\Models\Specialisation'  , "Specialization_id");
    }


        public function sections()
    {
        return $this->belongsToMany("\App\Models\Section", 'teachers_section');
    }
}
