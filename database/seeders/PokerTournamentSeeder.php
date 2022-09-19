<?php

namespace Database\Seeders;

use App\Models\PokerTournament;
use Illuminate\Database\Seeder;

class PokerTournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PokerTournament::factory()->count(5)->create();
        $tournaments = ['2022 WSOP Online', '2022 RGPS Bay Area',
            '2022 MSPT United States Poker Championship', '2022 Winamax Poker Open Bratislava',
            '2022 Unibet Malta', ];

        foreach ($tournaments as $tournament) {
            PokerTournament::factory()->create(['title' => $tournament]);
        }
    }
}
