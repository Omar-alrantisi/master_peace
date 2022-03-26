<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->date("dob")->nullable();
            $table->string("title");
            $table->string("area");
            $table->text("description");
            $table->text("image");
            $table->integer("price");
            $table->integer("years_of_experience");
            $table->integer("number_of_employees");
            $table->string('email')->unique();
            $table->boolean('is_verified')->default(false);
            $table->enum('gender', ['0','1','2'])->default('0');
            $table->string('additional_mobile_number')->nullable();
            $table->string('personal_photo');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->softDeletes();

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
        Schema::dropIfExists('workers');
    }
}
