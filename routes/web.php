<?php


use App\Http\Controllers\SectionController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => ['guest']] , function(){
Route::get('/', function () {
    return view('auth.login');
});

});


Auth::routes();




Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'  , "auth"]
], function(){
    Route::get('/home', function(){
    return view("dashboard");
} );


Route::resource('grade', "GradeController");
Route::resource('classrom', "ClassromController");

Route::resource('section', "SectionController");

 Route::get('/classes/{id}',  "SectionController@getclasses");

 Route::view('add_parent', 'livewire.show_form')->name("add_parent");
 Route::view('show_parent', 'livewire.show_table')->name("show_parent");
  Route::group(['namespace' => 'Teachers'], function () {
    Route::resource('teacher', 'TeacherController');
  });


  Route::group(['namespace' => 'Students'], function () {
    Route::resource('Students', "StudentController");
    Route::get("Get_classrooms/{id}" , "StudentController@Get_classrooms");
    Route::get("Get_Sections/{id}" , "StudentController@Get_Sections" );
    Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
    Route::resource('library', 'LibraryController');
    Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
    Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');

    Route::resource('Promotion', 'PromotionController');

    Route::resource("Graduated", "GraduatedController");

    Route::resource("Fees" , "FeesController");

      Route::resource('receipt_students', 'ReceiptStudentsController');
      Route::resource('ProcessingFee', 'ProcessingFeeController');
      Route::resource('Payment_students', 'PaymentController');


    Route::resource("Fees_Invoices" ,  "FeeInvoicesController");

    Route::resource("Attendance" ,"AttendanceController");


  });

    Route::group(['namespace' => 'Subjects'] , function (){

        Route::resource("Subjects" , "SubjectController");
    });

    Route::group(['namespace'=>'Quizzes' ] , function (){
        Route::resource("Quizzes" , "QuizzeController");
    });

    Route::group(['namespace'=>'Questions' ] , function (){
        Route::resource("Questions" , "QestionController");
    });
});











