<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classrom extends Model
{

    protected $table = 'Classroms';
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('Grade', 'grade_id');
    }

}
