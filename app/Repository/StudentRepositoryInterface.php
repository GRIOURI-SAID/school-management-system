<?php

namespace App\Repository;

interface  StudentRepositoryInterface{


    public function createStudent();

    public function Get_classrooms($request);

    public function Get_Sections($request);

    public function AddStudent($request);

    public function Get_Student();

    public function Edit_Student($request);

    public function UpdateStudent($request);

    public function ShowStudent($request);

    public function Delete_Student($request);

    public function Upload_attachment($request);

    public function Download_attachment($studentsname, $filename);

    public function Delete_attachment($request);

}
