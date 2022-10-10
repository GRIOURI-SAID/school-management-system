<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassromsTable extends Migration {

	public function up()
	{
		Schema::create('Classroms', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Name_class');
			$table->integer('grade_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Classroms');
	}
}