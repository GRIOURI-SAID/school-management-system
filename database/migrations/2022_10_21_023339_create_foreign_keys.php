<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Classroms', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

        Schema::table('Sections', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('Grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});




         Schema::table('parent_attachments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my__parents');
        });

		// Schema::table('Sections', function(Blueprint $table) {
		//  	$table->foreign('class_id')->references('id')->on('Classroms')
		// 				->onDelete('cascade')
		//  				->onUpdate('cascade');
		// });
	}

	public function down()
	{
    Schema::table('Classroms', function (Blueprint $table) {
        $table->dropForeign('Classroms_grade_id_foreign');
    });



    Schema::table('Sections', function (Blueprint $table) {
        $table->dropForeign('Sections_grade_id_foreign');
    });
    Schema::table('Sections', function (Blueprint $table) {
        $table->dropForeign('Sections_class_id_foreign');
    });
}

}
