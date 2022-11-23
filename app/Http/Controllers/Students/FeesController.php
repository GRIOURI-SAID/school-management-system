<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFee;
use App\Models\Fee;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    protected  $Fees;
    public function  __construct(FeeRepositoryInterface  $Fees){
          return $this->Fees = $Fees;
    }
    public function index()
    {
        return $this->Fees->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  $this->Fees->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFee $request)
    {
        return  $this->Fees->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    public function edit($id)
    {

        return $this->Fees->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Fees->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        return  $this->Fees->destroy($request);
    }
}
