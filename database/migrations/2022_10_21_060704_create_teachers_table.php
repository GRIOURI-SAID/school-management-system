<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("Name");
            $table->bigInteger("Specialization_id")->unsigned();
            $table->foreign("Specialization_id")->references("id")->on("specialisations")->onDelete('cascade');
            $table->bigInteger("gender_id")->unsigned();
            $table->foreign('gender_id')->references("id")->on("genders")->onDelete("cascade");
            $table->date('Joining_Date');
            $table->text('Address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
