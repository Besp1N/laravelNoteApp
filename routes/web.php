<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoAppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("home.index");

Route::prefix("todoapp")->name("todoapp.")->controller(TodoAppController::class)->group(function ()
{
    Route::get('/', "index")->name("index");
    Route::post('/',  "store")->name("store");
    Route::delete('/{task}', "destroy")->name("destroy");
    Route::put('/update/{task}', "update")->name("update");
    Route::put('/complete/{task}', "complete")->name("complete");

});

Route::get('/blog', function () {
    return view('blog.index');
})->name("blog.index");






