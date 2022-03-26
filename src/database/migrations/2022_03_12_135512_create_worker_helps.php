<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerHelps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_helps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->text("description");
            $table->text("image");
            $table->unsignedBigInteger('worker_id');
            $table->timestamps();

            $table->foreign('worker_id')
                ->references('id')->on('workers')
                ->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_helps');
    }
}
