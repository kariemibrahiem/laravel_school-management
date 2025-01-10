<?php

namespace App\Repository;



use http\Env\Request;

interface TeacherRepositoryInterface{

    public function getAllTeachers();

    public function create();
    public function store($request);

    public function  edit($id);

    public function update($request);
    public  function destroy($id);
}
