<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveReportPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_report_players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('player_id');
            $table->foreignId('poker_event_id')->nullable();
            $table->integer('current_chips')->default(0);
            $table->float('payout', 15, 2)->default(0);
            $table->integer('rank')->default(0);
            $table->integer('chips_before')->default(0);
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
        Schema::dropIfExists('live_report_players');
    }
}
