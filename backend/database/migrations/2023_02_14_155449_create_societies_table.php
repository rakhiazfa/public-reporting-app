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
        Schema::create('societies', function (Blueprint $table) {
            $table->id();

            $table->string('nik')->unique();
            $table->string('name');
            $table->date('date_of_birth');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('phone');

            $table->foreignId('job_id')
                ->nullable()
                ->constrained('jobs')->nullOnDelete();

            $table->foreignId('user_id')->unique()
                ->constrained('users')->cascadeOnDelete();

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
        Schema::dropIfExists('societies');
    }
};
