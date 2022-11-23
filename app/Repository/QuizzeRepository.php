<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class QuizzeRepository implements QuizzeRepositoryInterface
{
    public function index()
    {
        $quizzes = Quizze::get();
        return view("Quizzes.index" , compact("quizzes"));
    }

    public function create()
    {
        $subjects =Subject::all();
        $teachers  = Teacher::all();
        $grades =Grade::all();
        return view("Quizzes.create"  , compact("subjects" , "teachers" , "grades") );
    }

    public function store($request)
    {
        try {
               $quizze = new Quizze();
               $quizze->name = ["en" => $request->Name_en , "ar" =>$request->Name_ar];
               $quizze->subject_id =$request->subject_id;
               $quizze->grade_id=$request->Grade_id;
               $quizze->classroom_id=$request->Classroom_id;
               $quizze->section_id=$request->section_id;
               $quizze->teacher_id=$request->teacher_id;
               $quizze->save();

               toastr()->success(trans('messages.success'));
               return  view('Quizzes.index');

        }
        catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $subjects =Subject::all();
        $teachers  = Teacher::all();
        $grades =Grade::all();
        $quizz  =Quizze::findOrFail($id);
        return view("Quizzes.edit"  , compact("quizz","subjects" , "teachers" , "grades") );
    }

    public function update($request)
    {
        try {
            $quizze =Quizze::findOrFail($request->id);
            $quizze->name = ["en" => $request->Name_en , "ar" =>$request->Name_ar];
            $quizze->subject_id =$request->subject_id;
            $quizze->grade_id=$request->Grade_id;
            $quizze->classroom_id=$request->Classroom_id;
            $quizze->section_id=$request->section_id;
            $quizze->teacher_id=$request->teacher_id;
            $quizze->save();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('Quizzes.index');

        }
        catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destory($request)
    {
        try {
            $quizze =Quizze::findorFail($request->id);
            $quizze->delete();

            toastr()->success(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
