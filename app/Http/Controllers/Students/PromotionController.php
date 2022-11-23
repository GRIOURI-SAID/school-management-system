<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\PromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    protected $Promotions;

    public function __construct(PromotionRepositoryInterface $Promotions)
    {
        $this->Promotions = $Promotions;
    }

    public function index()
    {
        return $this->Promotions->index();
    }


    public function create()
    {
        return $this->Promotions->create();
    }


    public function store(Request $request)
    {
         return $this->Promotions->store($request);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
