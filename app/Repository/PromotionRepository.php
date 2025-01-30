<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PromotionRepository implements PromotionRepositoryInterface
{
    public function index(){
        $Grades = Grade::all();
        return view("pages.promotions.promotion" ,compact("Grades"));
        return "the promotion from repo";
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $students = Student::where("grade_id" , $request->Grade_id)->where("section_id" , $request->section_id )->where("Classroom_id" , $request->Classroom_id)->get();
            foreach ($students as $student){
                $IDs = explode("," , $student->id);
                $student->grade_id = $request->Grade_id_new;
                $student->section_id = $request->section_id_new;
                $student->Classroom_id = $request->Classroom_id_new;
                $student->save();
//
                Promotion::updateOrCreate(
                    ['student_id' => $student->id],
                    [
                        'from_grade' => $request->Grade_id,
                        'from_class_room' => $request->Classroom_id,
                        'from_section' => $request->section_id,
                        'from_year' => $request->from_year,
                        'to_grade' => $request->Grade_id_new,
                        'to_class_room' => $request->Classroom_id_new,
                        'to_section' => $request->section_id_new,
                        'to_year' => $request->to_year,
                    ]
                );
            }
        DB::commit();
            toastr()->success(trans('students.success'));
        }catch (\Exception $e){
            DB::rollBack();
            toastr()->error("something went wrong" . $e);
        }



            return  redirect("students");
    }

    public function create(){
        return "the mian interfce";
    }
}
