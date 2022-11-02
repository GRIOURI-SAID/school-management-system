<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialisation;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeacher()
    {
        return Teacher::all();
    }

    public function getAllGender()
    {
        return Gender::all();
    }

    public function getAllSpecailistion()
    {
        return Specialisation::all();
    }


     public function StoreTeachers($request)
     {
         try {
             $Teachers = new Teacher();
             $Teachers->email = $request->Email;
             $Teachers->password =  Hash::make($request->Password);
             $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
             $Teachers->Specialization_id = $request->Specialization_id;
             $Teachers->Gender_id = $request->Gender_id;
             $Teachers->Joining_Date = $request->Joining_Date;
             $Teachers->Address = $request->Address;
             $Teachers->save();
             toastr()->success(trans('messages.success'));
             return redirect()->route('teacher.create');
         } catch  (Exeption $e) {
             return redirect()->back()->with(['error' => $e->getMessage()]);
         }
     }
 public function destroyTeacher($request)
 {
     try {
         Teacher::findorFail($request->id)->delete();
         toastr()->success(trans('messages.success'));
         return redirect()->route('teacher.index');
     } catch  (Exeption $e) {
         return redirect()->back()->with(['error' => $e->getMessage()]);
     }
 }



 public function getTeacherById($id)
 {
     try {
         return Teacher::findorFail($id);
     } catch  (Exeption $e) {
         return redirect()->back()->with(['error' => $e->getMessage()]);
     }
 }

 public function editTeacher($request){
  try {
             $Teachers = Teacher::findorFail($request->id);
             $Teachers->email = $request->Email;
             $Teachers->password =  Hash::make($request->Password);
             $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
             $Teachers->Specialization_id = $request->Specialization_id;
             $Teachers->Gender_id = $request->Gender_id;
             $Teachers->Joining_Date = $request->Joining_Date;
             $Teachers->Address = $request->Address;
             $Teachers->save();
             toastr()->success(trans("messages.Update"));
             return redirect()->route("teacher.index");
         } catch  (Exeption $e) {
             return redirect()->back()->with(['error' => $e->getMessage()]);
         }
 }
}

