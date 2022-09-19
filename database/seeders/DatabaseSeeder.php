<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Adi',
            'email' => 'admin@chanzglobal.com',
            'password' => bcrypt('admin'),
        ]);

        $role = Role::create([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ]);

        $author = Role::create([
            'name' => 'author',
            'guard_name' => 'web',
        ]);

        $user->assignRole('super-admin');

        $this->call([
            // CountriesSeeder::class,
            CurrencySeeder::class,
            // ArticleAuthorSeeder::class,
            // LevelSeeder::class,
            ArticleCategorySeeder::class,
            // ArticleSeeder::class,
            CountrySeeder::class,
            // PlayerSeeder::class,

            // PokerTourSeeder::class,
            // PokerTournamentSeeder::class,
            // PokerEventSeeder::class,
            // LiveReportSeeder::class,

        ]);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleAuthorsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(LiveReportLiveReportPlayerTableSeeder::class);
        $this->call(LiveReportPlayersTableSeeder::class);
        $this->call(LiveReportsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(PokerEventsTableSeeder::class);
        $this->call(PokerTournamentsTableSeeder::class);
        $this->call(PokerToursTableSeeder::class);
    }
}
