<?php

namespace App\Repository;

interface studentRepositoryInterface
{
    public function createStudent();

    public function getAll();
    public function Get_classrooms($id);

    public function Get_Sections($id);

    public function store_student($request);

    public function showstudent($request);

    public function update($request);

    public function destroy($request);
}
