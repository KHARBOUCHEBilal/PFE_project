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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user1_id');
            $table->unsignedBigInteger('user2_id');
            $table->unsignedBigInteger('user3_id');
            $table->unsignedBigInteger('subject1_id');
            $table->unsignedBigInteger('subject2_id');
            $table->unsignedBigInteger('subject3_id');
            $table->text('motivation');
            $table->tinyInteger('status')->default();
            $table->timestamps();

            $table->foreign('subject1_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');
            $table->foreign('subject2_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');
            $table->foreign('subject3_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');

            $table->foreign('user1_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('user2_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('user3_id')
                ->references('id')
                ->on('users')
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
        //
    }
};
