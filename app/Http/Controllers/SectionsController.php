<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    $Grades = Grade::with(['Sections'])->get();
    $sections = Sections::all();
    $list_Grades = Grade::all();
    $teacher = Teacher::with(["Sections"])->get();
    $teachers = Teacher::all();

    return view('pages.Sections.Sections',compact('Grades','list_Grades' , "sections" , "teachers" , "teacher"));
    }

    // the ajax classes controller
    public function getclasses($id)
    {
        $list_classes = ClassRoom::where("grade_id", $id)->get();

        return $list_classes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "Name_Section"=>"required|unique:sections,Name_Section",
            "Grade_id" => "required",
            "Class_id"=>"required",
        ]);
        $section = new Sections();
        $section->Name_Section =  $request->Name_Section;
        $section->Grade_id = $request["Grade_id"];
        $section->Class_id = $request["Class_id"];
        $section->save();
        $section->Teachers()->attach($request->teacher_id);

        toastr()->success("the store was successfull");
        return redirect("sections");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            "section_name"=>"required|unique:sections,Name_Section",
            "grade_id" => "required",
            "class_id"=>"required",
        ]);
        $section = Sections::where("id" , $request->id)->first();
        $section->	Name_Section = $request->section_name;
        $section->grade_id = $request->grade_id;
        $section->class_id = $request->class_id;
        $section->save();
        if (isset($request->teacher_id)) {
            $section->Teachers()->sync($request->teacher_id);
        } else {
            $section->Teachers()->sync(array());
        }

        toastr()->success("the update was successfull");
        return redirect("sections");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Sections::destroy($request->id);
        toastr()->success("the record deleted successfully");
        return redirect("sections");
    }
}
