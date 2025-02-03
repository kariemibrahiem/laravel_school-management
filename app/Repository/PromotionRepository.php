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
//        return $request;
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
        $promotions  = Promotion::all();
        return view("pages.promotions.management" , compact("promotions"));
    }

    public function destroy($request){
        DB::beginTransaction();
        try{

            if ($request->status_id == 1){
                $Promotions = Promotion::all();
                foreach ($Promotions as $Promotion) {

                    $ids = explode(',', $Promotion->student_id);
                    Student::whereIn('id', $ids)
                        ->update([
                            'Grade_id' => $Promotion->from_grade ,
                            'Classroom_id' => $Promotion->from_class_room ,
                            'section_id' => $Promotion->from_section ,
                            'academic_year' => $Promotion->from_year,
                        ]);

                    Promotion::truncate();

                    DB::commit();
                    toastr()->success("the proccess success");
            }
            }else{
                $promotion_s = Promotion::findOrFail($request->promotion_id);
                Student::where("id" , $promotion_s->student_id)->update([
                    'Grade_id' => $promotion_s->from_grade ,
                    'Classroom_id' => $promotion_s->from_class_room ,
                    'section_id' => $promotion_s->from_section ,
                    'academic_year' => $promotion_s->from_year,
                ]);


                Promotion::destroy($request->promotion_id);

                DB::commit();
                toastr()->success("i think its work");
            }
        }catch (\Exception $e){
            DB::rollBack();
            toastr()->error("dont work" . $e);
        }
        return redirect("promotions.create");
    }

    public function graduate($id){
        DB::beginTransaction();
        try {
            $promotion = Promotion::find($id);
            Student::where("id" , $promotion->student_id)->delete();
            toastr()->success("the student deleted successfully");
            DB::commit();
        }catch (\Exception $e){
            toastr()->error("not good");
            DB::rollBack();
        }
        return redirect("promotions.create");
    }

}
