<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_code')->nullable();
            $table->string('room_name');
            $table->string('room_type');
            $table->integer('room_price');
            $table->integer('room_capacity');
            $table->string('bed_info');
            $table->string('facility');
            $table->string('banner')->nullable();
            $table->string('post_img')->nullable();
            $table->text('detail_img')->nullable();
            $table->enum('room_status',['available','occupied']);
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
        Schema::dropIfExists('rooms');
    }
}
