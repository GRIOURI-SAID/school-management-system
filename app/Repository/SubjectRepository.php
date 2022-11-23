<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = Subject::all();
        return view("Subjects.index" , compact("subjects"));
    }


    public function create()
    {
        $grades = Grade::all();
        $teachers =Teacher::all();

        return view("Subjects.create" , compact('grades' , "teachers"));
    }

    public function edit($id)
    {
        $grades = Grade::all();
        $teachers =Teacher::all();
        $subject  = Subject::findorfail($id);
        return view("Subjects.edit" , compact('grades' , "teachers" , "subject"));
    }

    public function store($request)
    {
        try {

            $subject = new Subject();
            $subject->name =["en" =>$request->Name_en  ,"ar"  =>$request->Name_ar];
            $subject->grade_id = $request->Grade_id;
            $subject->classroom_id=$request->Class_id;
            $subject->teacher_id =$request->teacher_id;
            $subject->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route("Subjects.index");


        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update($request)
    {

        try {

            $subject = Subject::findorFail($request->id);
            $subject->name =["en" =>$request->Name_en  ,"ar"  =>$request->Name_ar];
            $subject->grade_id = $request->Grade_id;
            $subject->classroom_id=$request->Class_id;
            $subject->teacher_id =$request->teacher_id;
            $subject->save();

            toastr()->success(trans('messages.update'));
            return redirect()->route("Subjects.index");


        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destory($request)
    {
        try {

            $subject = Subject::findorFail($request->id);
            $subject->delete();


            toastr()->success(trans('messages.Delete'));
            return redirect()->back();


        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
