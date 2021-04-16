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
            $table->unsignedBigInteger('game_id')->nullable();
            $table->foreign('game_id', 'fk_parties_games')
            ->on('games')
            ->references('id')
            ->onDelete('set null');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'fk_parties_owners')
            ->on('users')
            ->references('id')
            ->onDelete('set null');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id', 'fk_parties_members')
            ->on('users')
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
