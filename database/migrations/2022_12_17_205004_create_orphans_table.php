<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orphanage_id');
            $table->foreign('orphanage_id')->references('id')->on('orphanages')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->datetime('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('orphans');
    }
};
