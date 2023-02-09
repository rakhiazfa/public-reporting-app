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
        Schema::create('agency_locations', function (Blueprint $table) {
            $table->id();

            $table->string('country')->default('Indonesia');
            $table->string('province');
            $table->string('city');
            $table->string('postal_code');
            $table->text('address');

            $table->foreignId('agency_id')->constrained('agencies')->cascadeOnDelete();

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
        Schema::dropIfExists('agency_locations');
    }
};
