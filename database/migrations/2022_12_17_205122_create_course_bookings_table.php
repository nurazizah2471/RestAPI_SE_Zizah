<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedBigInteger('orphanage_id');
            $table->foreign('course_id')->references('id')->on('courses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('orphanage_id')->references('id')->on('orphanages')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('status', ['pending', 'ongoing', 'complete', 'canceled']);
            $table->integer('member_sum')->default(1);
            $table->string('location')->nullable();
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
        Schema::dropIfExists('course_bookings');
    }
};
