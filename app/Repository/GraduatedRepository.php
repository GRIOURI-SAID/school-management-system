<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;

class GraduatedRepository implements GraduatedRepositoryInterface
{
    public function create()
    {
         $Grades = Grade::all();

         return view("students.Graduated.create" , compact("Grades"));
    }

    public function index()
    {
        $students =Student::onlyTrashed()->get();
        return view("students.Graduated.index" , compact("students"));
    }

    public function SoftDelete($request)
    {
      $students =Student::where("Grade_id" ,$request->Grade_id )->where("Classroom_id" , $request->Classroom_id)->get();

      if($students->count() <1){
          return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
      }

      foreach ($students as $student){
          $ids = explode("," , $student->id);
          Student::whereIn("id" , $ids)->delete();

    }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Graduated.index');


    }

    public function ReturnData($request)
    {
        Student::onlyTrashed()->where("id" , $request->id)->first()->restore();

        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        Student::onlyTrashed()->where("id" , $request->id)->first()->forceDelete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->back();
    }


}
