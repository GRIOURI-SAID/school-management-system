<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\Grade;
use Illuminate\Http\Request;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use PhpParser\Node\Stmt\TryCatch;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Grades = Grade::all();
      return view("grades.Grades" , compact("Grades"));

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

    try{
  $validated = $request->validated();

     $newGrade = new Grade();
     $newGrade->Name =['en' => $request->Name_en , "ar" => $request->Name];
     $newGrade->Node = $request->Notes;

     $newGrade->save();

        toastr()->success(trans('messages.success'));
          return redirect()->route('grade.index');
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
  public function update(StoreGrade $request)
  {
      try{


        $validated = $request->validated();
        $Grade= Grade::findorFail($request->id);
        $Grade->update([
             $Grade->Name =['en' => $request->Name_en , "ar" => $request->Name],
             $Grade->Node = $request->Notes
        ]);

         toastr()->success(trans("messages.Update"));
          return redirect()->route('grade.index');

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
  public function destroy(Request $request)
  {

    try{

        $Grade= Grade::findorFail($request->id)->delete();

          toastr()->success(trans("messages.Delete"));
          return redirect()->route('grade.index');
    }

    catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

}

?>
