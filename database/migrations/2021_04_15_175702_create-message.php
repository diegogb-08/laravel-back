<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'fk_messages_users')
            ->on('users')
            ->references('id')
            ->onDelete('restrict');
            $table->unsignedBigInteger('party_id')->nullable();
            $table->foreign('party_id', 'fk_messages_parties')
            ->on('parties')
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
        Schema::dropIfExists('messages');
    }
}
