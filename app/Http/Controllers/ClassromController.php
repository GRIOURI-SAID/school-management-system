<?php

namespace App\Http\Controllers;

use App\Models\Classrom;
use App\Models\Grade;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ClassromController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Classroms = Classrom::all();
      $Grades = Grade::all();
      return view("classroms.Classroms" , compact("Classroms" , "Grades"));
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
      $list_classes= $request->List_Classes;

     try{

        foreach($list_classes as $classroom){
           $newclassroom  = new Classrom();
           $newclassroom->Name_class =['en' => $classroom["Name_class_en"] , "ar" => $classroom["Name"]];
           $newclassroom->grade_id=$classroom["Grade_id"];
          $newclassroom->save();

        }

         toastr()->success(trans('messages.success'));
          return redirect()->route('classrom.index');

     }
     catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


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
      $classroom = Classrom::findorFail($request->id);
      try{

        $classroom->update([
              $classroom->Name_class =['en' =>$request->Name_class_en , "ar" =>  $request->Name],
           $classroom->grade_id =$request->Grade_id
        ]);

         toastr()->success(trans('messages.success'));
          return redirect()->route('classrom.index');
      }

      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request  $request)
  {

    try{
        $id = $request->id;
          Classrom::findorFail($id)->delete();

         toastr()->success(trans('messages.success'));
          return redirect()->route('classrom.index');
    }

    catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }




  }

}

?>
