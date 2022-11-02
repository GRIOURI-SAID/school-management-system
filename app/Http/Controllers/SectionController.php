<?php

namespace App\Http\Controllers;

use App\Models\Classrom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Grades=Grade::with(["Sections"])->get();
      $list_Grades =Grade::all();
      $teachers = Teacher::all();


     return view("sections.Sections" , compact("Grades" , 'list_Grades' , "teachers"));
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
try {

      $Sections = new Section();

      $Sections->Name_section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
      $Sections->grade_id = $request->Grade_id;
      $Sections->class_id = $request->Class_id;

      $Sections->status = 1;
      $Sections->save();
      $Sections->teachers()->attach($request->teacher_id);
      toastr()->success(trans('messages.success'));

      return redirect()->route('section.index');
  }
  catch
  (\Exception $e) {
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
      try{


      $Sections = Section::findOrFail($request->id);

          $Sections->Name_section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
          $Sections->grade_id = $request->Grade_id;
          $Sections->class_id = $request->Class_id;
        if(isset($request->Status)) {
         $Sections->status = 1;
          } else {
        $Sections->status = 2;
         }


         // update pivot tABLE
        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
            $Sections->teachers()->sync(array());
        }


       $Sections->save();
      toastr()->success(trans("messages.Update"));

return redirect()->route('section.index');
      }

          catch
  (\Exception $e) {
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
        Section::findorFail($request->id)->delete();
         toastr()->success(trans("messages.Delete"));

         return redirect()->route('section.index');

      }
       catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }


  }



   public function getclasses($id)
    {
        $list_classes = Classrom::where("grade_id", $id)->pluck("Name_class", "id");

        return $list_classes;
    }

}

?>
