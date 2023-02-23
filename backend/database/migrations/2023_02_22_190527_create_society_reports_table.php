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
        Schema::create('society_reports', function (Blueprint $table) {
            $table->id();

            $table->string('ticket_id')->unique();

            $table->enum('type', ['pengaduan', 'aspirasi', 'permintaan-informasi']);
            $table->string('image')->nullable();
            $table->string('title');
            $table->text('body');
            $table->date('date');
            $table->enum('status', ['process', 'accepted', 'rejected'])->default('process');
            $table->string('attachment');
            $table->string('slug')->unique();

            $table->foreignId('category_id')->constrained('report_subcategories');

            $table->foreignId('destination_agency_id')->constrained('agencies');

            $table->foreignId('author_id')->constrained('societies');

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
        Schema::dropIfExists('society_reports');
    }
};
