<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\ClassRoom ;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassRoom::all();
        $grades = Grade::all();
        return view("pages.classroom.classroom" , compact("classes" , "grades"));
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
    public function store(ClassRequest $request)
    {
        // $attributes = request()->validate(['className' => 'required|unique_translation:class_rooms',]);
        // return $request;

        try{
            foreach($request->List_Classes as $list){
                $class = new ClassRoom();
                $class->className = $list["Name"];
                $class->grade_id = $list["Grade_id"];
                $class->save();
            }


          
        }catch(Exception $e){
            return redirect("classes")->withErrors("fial" .$e);
        }

        return redirect("classes");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Request $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function updateClass(Request $request)
    {
        // return $request;
        $class = ClassRoom::where("id" , $request->id);
        $class->update([
            "className" => $request->name,
            "grade_id"  => $request->grade_id 
        ]);
        return redirect("classes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       
        ClassRoom::destroy($request->id);
        
        flash()->success('Operation completed successfully.');
        return redirect("classes");
    }
}
