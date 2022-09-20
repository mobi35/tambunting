<?php

use App\Models\Article;
use App\Models\ArticleAuthor;
use App\Models\ArticleCategory;
use App\Models\Level;
use App\Models\PokerEvent;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

// test('reports is working', function () {
//     // $response = $this->get('/api/report');
//     // $response->assertStatus(200);
// });

it('cannot create reports if unauthenticated', function () {
    $this->post('admin/report/', [
        'title' => 'adrian',
    ])->assertStatus(302);
});

it('can insert reports if authenticated', function () {
    $u = User::factory()->create();
    $role = Role::create([
        'name' => 'super-admin',
    ]);

    $user = $this->actingAs(User::factory()->create() );

    // dd($user);


    // User::factory()->create()->role()->attach($role);


    backpack_user()->assignRole('super-admin');

    $this->get('admin/report/create')->assertStatus(200);

    $data = [
        'title' => 'A report',
        'content' => 'this a content',
        'day' => '1A',
        'level_id' => Level::factory()->create()->id,
        'poker_event_id' => PokerEvent::factory()->create()->id,
        'date_added'=> '2021-02-02 00:00:00',
        'players' => '[{"rank":"1","player_id":"41","current_chips":"60000","payout":"0"}]',
        'user_id' => User::factory()->create()->id
    ];

    $datas = $this->post('/admin/events', $data);
    dd($datas);

    // dd($datas);

    $this->assertDatabaseHas('poker_events', ['title' => 'A report',
    ]);

    // $datas->assertSessionHasErrors('date_start');
    // $datas->assertSessionHasErrors('end_date');
});

// it('can update article if authenticated', function () {

//       $u = User::factory()->create();
//         $role = Role::create([
//         'name' => 'super-admin',
//     ]);

//     $user = $this->actingAs(User::factory()->create(), 'web');

//     backpack_user()->assignRole('super-admin');

//     $article = Article::factory()->create();

//     $this->get('admin/article/'. $article->id . '/edit')->assertStatus(200);

//     $data = [
//         'id' => $article->id,
//         'title' => 'things I hate',
//         'description' => 'description',
//         'body' => 'body',
//         'published_date' => '2020-04-17',
//         'article_author_id' => ArticleAuthor::factory()->create()->id,
//         'article_categories' => collect(ArticleCategory::factory()->times(2)->create()) ->pluck('id')->toArray()
//     ];

//     $datas = $this->put('admin/article/update', $data);
//     $this->assertDatabaseHas('articles', ['title' => 'things I hate',
//         'description' => 'description',
//         'body' => 'body'
//         ] );
//     $this->assertDatabaseCount('articles', 1);

// });

// it('can delete article if authenticated', function () {

//     $u = User::factory()->create();
//         $role = Role::create([
//         'name' => 'super-admin',
//     ]);

//     $user = $this->actingAs(User::factory()->create(), 'web');
//     backpack_user()->assignRole('super-admin');
//     $article = Article::factory()->create();
//     $this->get('admin/article')->assertStatus(200);
//     $datas = $this->delete('admin/article/1');
// });
