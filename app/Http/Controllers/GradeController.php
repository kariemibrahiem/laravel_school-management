<?php 

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\Grade;
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
  public function store(Request $request)
  {
    try{
          
        $request->validate([
          "Name" => "required",
        ]);

        // translation part
        $grade = new Grade;
        $grade->Name = ["en" => $request->Name , "ar" => $request->Name_en];
        $translation = [
          "en" => $request->name_en,
          "ar" =>$request->name
        ];
      // $grade->setTranslation("Name" , $translation")
        // Display a success toast with no title
        flash()->success('Operation completed successfully.');
        toastr()->success('Data has been saved successfully!');
        // store part 
        Grade::create([
          "Name"=>request("Name"),
          "Notes" => $request->Notes
        ]);
    }catch(Exception $e){
      flash()->fail($e);
    }
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
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>