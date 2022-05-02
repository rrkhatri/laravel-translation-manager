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
        Schema::create('pltm_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('route_id')->nullable();
            $table->string('locale', 2);
            $table->string('key')->nullable();
            $table->string('from');
            $table->string('to');
            $table->dateTime('processed_at')->nullable();
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
        Schema::dropIfExists('pltm_translations');
    }
};
