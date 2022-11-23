<?php

namespace App\Repository;

interface AttendanceRepositoryInterface
{
    public  function  index();

    public function  edit($id);


    public function  store($request);

    public function  update($request);

    public function  destory($request);

}
