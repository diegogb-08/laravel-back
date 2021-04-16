<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->foreign('gameId')
            ->on('games')
            ->references('id')
            ->onDelete('restrict');
            $table->foreign('ownerId')
            ->on('users')
            ->references('id')
            ->onDelete('restrict');
            $table->foreign('memberId')
            ->on('users')
            ->references('id')
            ->onDelete('restrict');
            $table->foreign('messageId')
            ->on('messages')
            ->references('id')
            ->onDelete('restrict');
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
}
