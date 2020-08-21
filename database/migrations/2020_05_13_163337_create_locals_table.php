<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('document_user');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('coordinates');
            $table->string('address');
            $table->string('other');
            $table->string('local_name');
            $table->string('local_img');
            $table->timestamps();
            $table->foreign('document_user')->references('document')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
