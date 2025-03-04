<?php 

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Sections;
use Exception;
use Illuminate\Http\Request;

class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $grades = Grade::all();
    return view("pages.grades.grades" , compact("grades"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGrade $request)
  {
    // $attributes = request()->validate(['name' => 'required|unique_translation:Grades',]);
    
    
    try{

      // $request->validate([
      //   "name" => "required",
      // ]);
      
      $grade = new Grade();
      $grade->name = $request->name;
      $grade->notes = $request->notes;
      $grade->save();
      
 
      toastr()->success('Data has been saved successfully!');
      
      
    }catch(Exception $e){
      toastr()->error("the class deleted field" .$e);
      return redirect("grade");
    }
  

    // toastr()->success("the class stored successfuly");
    return redirect("grade");
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    
    
    
    $grade = Grade::where("id" , $request->id)->first();
    $grade->name = $request->name;
    $grade->notes = $request->notes;
    $grade->save();

    toastr()->success("udapted successfully");

    return redirect("grade");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
   $classes = ClassRoom::where("grade_id" , $request->id)->get() ;
   $sections = Sections::where("grade_id" , $request->id)->get();
   
    foreach( $classes as $class) {
      $class->delete();
    }

    foreach( $sections as $section) {
      $section->delete();
    }

      $grade = Grade::where("id" , $request->id)->first();
      $grade->delete();

      toastr()->success("the class deleted successfuly");
    return redirect("grade");
    
  }
  
}

?>