<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Repository\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    protected  $Quizzes;
    public function __construct(QuizzeRepositoryInterface  $Quizzes)
    {
        return $this->Quizzes =$Quizzes;
    }

    public function index()
    {
        return $this->Quizzes->index();
    }


    public function create()
    {
        return $this->Quizzes->create();
    }


    public function store(Request $request)
    {
        return $this->Quizzes->store($request);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->Quizzes->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Quizzes->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        return $this->Quizzes->destory($request);
    }
}
