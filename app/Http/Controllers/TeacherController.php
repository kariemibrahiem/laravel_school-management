<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{

    protected $teacher;
    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();
        return view("pages.teachers.teachers" , compact("teachers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->teacher->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
////        return $request;
//        Teacher::create([
//            "name" => $request->name,
//            "email" => $request->email,
//            "password" => $request->password,
//            "gander" => $request->gander,
//            "specialization_id" => $request->specialization_id,
//            "joining_date" => $request->joining_data,
//            "address" => $request->address,
//        ]);
        $this->teacher->store($request);
        return redirect("teachers");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request)
    {

        $teacher = Teacher::find($request->id);
        $specializations = Specialization::all();
        $genders = Teacher::pluck("gander");
        return view("pages.teachers.edit" , compact("teacher" , "specializations" , "genders"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->teacher->update($request);
        return redirect("teachers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {

        $this->teacher->destroy($request->id);
        return redirect("teachers");
    }
}
