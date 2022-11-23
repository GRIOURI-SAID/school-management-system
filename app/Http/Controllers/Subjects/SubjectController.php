<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected  $Subjects;

    public function  __construct( SubjectRepositoryInterface  $Subjects){
      return $this->Subjects = $Subjects;
    }
    public function index()
    {
        return $this->Subjects->index();
    }


    public function create()
    {
        return $this->Subjects->create();
    }


    public function store(Request $request)
    {

        return $this->Subjects->store($request);
    }


    public function edit($id)
    {
        return $this->Subjects->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Subjects->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subjects->destory($request);
    }
}
