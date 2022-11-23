<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected  $Attendance;

    public function __construct( AttendanceRepositoryInterface  $Attendance  )
    {
        return $this->Attendance =  $Attendance;
    }


    public function index()
    {
        return $this->Attendance->index();
    }


    public function store(Request $request)
    {
        return $this->Attendance->store($request);

    }


    public function show($id)
    {
        return $this->Attendance->edit($id);

    }


    public function edit($id)
    {


    }

    public function update(Request $request)
    {
        return $this->Attendance->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Attendance->destory($request);
    }
}
