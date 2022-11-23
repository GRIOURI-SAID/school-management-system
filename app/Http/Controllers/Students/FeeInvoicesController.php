<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\FeeInvoiceRepositoryInterface;
use Illuminate\Http\Request;

class FeeInvoicesController extends Controller
{
    protected  $Fee_Invoices;

    public function  __construct(FeeInvoiceRepositoryInterface  $Fee_Invoices) {
        return $this->Fee_Invoices= $Fee_Invoices;
    }

    public function index()
    {
        return $this->Fee_Invoices->index();
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->Fee_Invoices->store($request);
    }

    public function show($id)
    {
        return $this->Fee_Invoices->show($id);
    }

    public function edit($id)
    {
        return $this->Fee_Invoices->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Fee_Invoices->update($request);
    }

    public function destroy(Request $request)
    {

      return $this->Fee_Invoices->destroy($request);

    }
}
