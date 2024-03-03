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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->text('description');
            // $table->string('category_id')->nullable();
            // $table->string('depend_on_s4')->nullable();
            // $table->tinyInteger('max_groups')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->enum('status', ['0', '1'])->default(0);
            $table->timestamps();
            
            $table->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
