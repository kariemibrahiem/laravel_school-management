<?php

namespace App\Repository;

use App\Models\Blood_type;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Myparent;
use App\Models\Nationalities;
use App\Models\Sections;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
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

    public function graduated_students()
    {
        $students = Student::onlyTrashed()->get();
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
//        return $request;
      try{
          DB::beginTransaction(); // Start transaction

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



//          $students = Student::latest()->first();
//          if($request->hasfile('photos'))
//            {
//                foreach($request->file('photos') as $file)
//                {
//                    $name = $file->getClientOriginalName();
//                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'public');
//
//                    // insert in image_table
//                    $images= new Image();
//                    $images->filename=$name;
//                    $images->imagable_id= $students->id;
//                    $images->imagable_type = 'App\Models\Student';
//                    $images->save();
//                }
//            }

          DB::commit(); // insert data

          toastr()->success(trans('messages.success'));

      }catch(Exception $e){
        toastr()->error("the insert field" .$e);

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
        Student::forceDeleted($request->id);
        toastr()->success("the student deleted successfully");
        return redirect("student.graduated_students");
    }

    public function restore($request){
        Student::withTrashed($request->student_id)->restore();
        toastr()->success("the student restored successfully");
        return redirect("students");
    }

    public  function  show($id){
        $Student = Student::findOrFail($id);

        return view("pages.students.show" , compact("Student"));
    }
}
