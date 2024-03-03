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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_teachers_active')->default(0);
            $table->string('is_students_active')->default(0);
            $table->dateTime('starts_at_teachers')->nullable();
            $table->dateTime('ends_at_teachers')->nullable();
            $table->dateTime('starts_at_students')->nullable();
            $table->dateTime('ends_at_students')->nullable();
            $table->tinyInteger('students_status')->nullable();
            $table->tinyInteger('show_finale_list')->nullable();
            $table->tinyInteger('teacher_status')->nullable();
            $table->unsignedBigInteger('chef_id')->nullable();
            $table->timestamps();
            $table->foreign('chef_id')
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
        Schema::dropIfExists('subjects');
    }
};
