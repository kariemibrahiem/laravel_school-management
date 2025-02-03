<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeStudentRequest;
use App\Models\Image;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Repository\studentRepositoryInterface;

class StudentController extends Controller
{
    public $student;
    public function __construct(studentRepositoryInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->student->getAll();
    }

    public function graduated_students()
    {
       return $this->student->graduated_students();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->student->createStudent();
    }
    public function Get_classrooms($id){
        return $this->student->Get_classrooms($id);
    }
    public function Get_Sections($id){
        return $this->student->Get_Sections($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeStudentRequest $request)
    {
        return $this->student->store_student($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  $this->student->show($id);
    }

    public function Upload_attachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new Image();
            $images->filename=$name;
            $images->imagable_id = $request->student_id;
            $images->imagable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('student.show',$request->student_id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return  $this->student->showstudent($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return  $this->student->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return  $this->student->destroy($request);
    }

    public function restore(Request $request)
    {
        return $this->student->restore($request);

    }


}
