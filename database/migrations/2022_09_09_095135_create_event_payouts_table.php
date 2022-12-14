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
        Schema::create('event_payouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id');
            $table->foreignId('event_id')->nullable();
            $table->foreignId('report_id')->nullable();
            $table->foreignId('place')->nullable();
            $table->string('prize')->nullable();
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
        Schema::dropIfExists('event_payouts');
    }
};
