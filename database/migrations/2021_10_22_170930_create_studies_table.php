<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('external_link')->nullable();
            $table->string('pdf_file')->nullable();
            $table->text('desc_one');
            $table->text('desc_two')->nullable();
            $table->unsignedBigInteger('study_areas_id')->unsigned();
            $table->timestamps();

            $table->foreign('study_areas_id')->references('id')->on('study_areas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studies');
    }
}
