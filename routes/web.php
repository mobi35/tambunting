<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Models\Payout;
use App\Models\Player;
use Illuminate\Support\Facades\Schema;
use Rap2hpoutre\FastExcel\FastExcel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get(->name('live-repor't)'/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::get('/live-report', function () {
    return Inertia::render('Report/Index');
})->name('live-report');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});



Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('admin/live_events', function () {
    return view('vendor.backpack.page.live_events');
});

Route::post('filepond', function () {
});

Route::post('prepare', function () {
    try {
        $realName = request()->all()['file']->getClientOriginalName();
        request()->all()['file']->move('uploads', $realName);
        $collection = (new FastExcel)->import('uploads/'.$realName);
        $header = array_values(collect(Schema::getColumnListing('payouts'))->filter(fn ($z) => $z == 'player_id' || $z == 'prize' || $z == 'country')->toArray());

        return [
            'excel_header' => array_keys($collection[0]),
            'main_header' => $header,
        ];

        return 1;
    } catch (Exception $e) {
        return 0;
    }
});

Route::post('upload_excel', function () {
    if (request()->all()['checkbox_overwrite']) {
        Payout::where('poker_event_id', request()->all()['event_id'])->delete();
    }

    try {
        $realName = request()->all()['file']->getClientOriginalName();
        request()->all()['file']->move('uploads', $realName);
        $currentHeader = json_decode(request()->all()['headers'], true);
        // dd(array_values(collect($currentHeader)->filter(fn ($a) => array_key_first($a) === 'prize')->toArray())[0]['prize']);
        $check = (new FastExcel())->import('uploads/'.$realName, function ($line) use ($currentHeader) {
            $player = $line[array_values(collect($currentHeader)->filter(fn ($a) => array_key_first($a) === 'player_id')->toArray())[0]['player_id']];

            $playerArray = explode(' ', trim($player));

            if (is_countable($playerArray) && count($playerArray) === 2) {
                $player = Player::where('name', $playerArray[0].' '.$playerArray[1])->first();
                if ($player !== null) {
                    $save = Payout::create([
                        'prize' => $line[array_values(collect($currentHeader)->filter(fn ($a) => array_key_first($a) === 'prize')->toArray())[0]['prize']],
                        'poker_event_id' => request()->all()['event_id'],
                        'player_id' => $player->id,
                    ]);
                }
            }
        });

        return 1;
    } catch (Exception $e) {
        return 0;
    }
});
