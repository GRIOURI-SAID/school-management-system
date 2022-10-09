<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('Grades', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Name');
			$table->text('Node');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Grades');
	}
}
