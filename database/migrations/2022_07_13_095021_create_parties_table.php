<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('party_name');
            $table->string('person_name');
            $table->bigInteger('voter_id')->unique();
            $table->integer('mobile');
            $table->string('password');
            $table->string('email')->unique();
            $table->text('image');
            $table->integer('votes')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('account_status');
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
        Schema::dropIfExists('parties');
    }
};
