<?php

namespace App\Repository;



interface TeacherRepositoryInterface{

    //get all teacher
    public function getAllTeacher();
    // get all gender
    public function getAllGender();
    //get all specailistaion
    public function getAllSpecailistion();
    //add new teacher
    public function StoreTeachers($request);
    // delete Teacher
    public function destroyTeacher($request);
   // get Teacher by id
    public function getTeacherById($request);
   // edit teacher
   public function editTeacher($request);
}



