<?php

use App\Services\Task\Http\Controllers\TaskController;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return Inertia::render('Tasks/Create');
});


Route::get('/task-list', [TaskController::class, 'get'])->name('tasklist');

Route::post('/add-task', [TaskController::class, 'add']);

