<?php
namespace App\Repository;

use App\Models\Specialization;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{


    public function getAllTeachers()
    {
        return  Teacher::all();
    }

    public function create(){
        $specializations = Specialization::all();
        $genders = Teacher::pluck("gander");
        return view("pages.teachers.add_teacher" , compact("specializations" , "genders"));
    }
    public function store($request){


        try {
//
            Teacher::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "gander" => $request->gander,
                "specialization_id" => $request->specialization_id,
                "joining_date" => $request->joining_data,
                "address" => $request->address,
            ]);
        }catch (\Exception $e){
            return redirect("teachers")->with("error" , $e->getMessage());
        }
        return redirect("teachers");
    }

    public function  edit($id)
    {
        $teacher = Teacher::find($id);
        $specializations = Specialization::all();
        $genders = Teacher::pluck("gander");
        return view("pages.teachers.edit" , compact("teacher" , "specializations" , "genders"));
    }

    public function update($request)
    {
        $teacher = Teacher::find($request->id);
        $teacher->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "gander" => $request->gander,
            "specialization_id" => $request->specialization_id ,
            "joining_date" => $request->joining_data,
            "address" => $request->address,
        ]);
        return redirect("teachers");
    }

    public function destroy($id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect("teachers");
    }
}
