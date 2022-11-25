<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Repository\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QestionController extends Controller
{
    protected  $Questions;

    public function __construct(QuestionRepositoryInterface  $Questions)
    {
        return $this->Questions =$Questions;
    }

    public function index()
    {
        return $this->Questions->index();
    }


    public function create()
    {
        return $this->Questions->create();
    }


    public function store(Request $request)
    {
        return $this->Questions->store($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        return $this->Questions->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Questions->update($request);
    }


    public function destroy(Request  $request)
    {
        return $this->Questions->destory($request);
    }
}
