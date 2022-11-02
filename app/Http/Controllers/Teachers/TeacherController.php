<?php

namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Teachers = $this->Teacher->getAllTeacher();
       return view("teacher.teacher", compact("Teachers"));
    }


    public function create()
    {
        $Genders = $this->Teacher->getAllGender();
        $Specailistions =$this->Teacher->getAllSpecailistion();
         return view("teacher.create" , compact("Genders" , "Specailistions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachers $request)
    {
       return $this->Teacher->StoreTeachers($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Teacher =$this->Teacher->getTeacherById(($id));
       $Genders = $this->Teacher->getAllGender();
        $Specailistions =$this->Teacher->getAllSpecailistion();
       return view("teacher.edit", compact("Teacher" , "Genders" , "Specailistions"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }



    public function update(Request $request)
    {

        return $this->Teacher->editTeacher($request);

    }


    public function destroy(Request $request)
    {

        return  $this->Teacher->destroyTeacher($request);

    }
}
