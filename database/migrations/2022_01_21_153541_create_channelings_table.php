<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channelings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id')->nullable();
            $table->string('topic',250);
            $table->date('date');
            $table->integer('no',false);
            $table->double('amount',10,2);
            $table->boolean('status',1)->default(0);
            $table->timestamps();
            $table->foreign('p_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channelings');
    }
}
