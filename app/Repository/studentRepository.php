<?php

namespace App\Repository;

use App\Models\Blood_type;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Myparent;
use App\Models\Nationalities;
use App\Models\Sections;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Hash;

class studentRepository implements studentRepositoryInterface
{
    public function createStudent(){
        $data["parents"] = Myparent::all();
        $data["grades"] = Grade::all();
        $data["classes"] = ClassRoom::all();
        $data["bloods"] = Blood_type::all();
        $data["nationality"] = Nationalities::all();

        return view("pages.students.add_students" , $data);
    }

    public function getAll(){
        $students = Student::all();
        return view("pages.students.students" , compact("students"));
    }

    public function Get_classrooms($id){
        $list_classes = ClassRoom::where("grade_id" , $id)->pluck("className" , "id");
        return $list_classes ;
    }

    public function Get_Sections($id){
        $list_sections  = Sections::where("class_id" , $id)->pluck("Name_Section" , "id");
        return $list_sections  ;
    }

    // insert the student
    public function store_student($request){
      try{
        $students = new Student();
        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender = $request->gender;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->Date_Birth = $request->Date_Birth;
        $students->Grade_id = $request->Grade_id;
        $students->Classroom_id = $request->Classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('students');
      }catch(Exception $e){
        toastr()->error("the insert field");
        return redirect()->route("students");
    }
    return redirect("students");
    }


    public function showstudent($request){
        $data["student"] = Student::find($request->id);
        $data["parents"] = Myparent::all();
        $data["grades"] = Grade::all();
        $data["classes"] = ClassRoom::all();
        $data["bloods"] = Blood_type::all();
        $data["nationality"] = Nationalities::all();
        return view("pages.students.editStudent" , $data);
    }

    public function update($request){
       try{
           $students = Student::where("id" , $request->id)->first();
           $students->name = $request->name;
           $students->email = $request->email;
           $students->password = Hash::make($request->password);
           $students->gender = $request->gender;
           $students->nationalitie_id = $request->nationalitie_id;
           $students->blood_id = $request->blood_id;
           $students->Date_Birth = $request->Date_Birth;
           $students->Grade_id = $request->Grade_id;
           $students->Classroom_id = $request->Classroom_id;
           $students->section_id = $request->section_id;
           $students->parent_id = $request->parent_id;
           $students->academic_year = $request->academic_year;
           $students->save();
           toastr()->success("the student updated successfully");
       }catch (Exception $e){
           toastr()->error("the update field" .$e);
       }
        return redirect("students");
    }


    public function destroy($request){
        Student::destroy($request->id);
        toastr()->success("the student deleted successfully");
        return redirect("students");
    }
}
