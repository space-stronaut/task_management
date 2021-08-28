<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/keluar', function(){
    Auth::logout();

    return redirect('/login');
});

Route::get('/members',[MemberController::class, 'index']);
Route::get('/members/create',[MemberController::class, 'create']);
Route::post('/members/store',[MemberController::class, 'store']);
Route::get('/members/edit/{id}',[MemberController::class, 'edit']);
Route::put('/members/update/{id}',[MemberController::class, 'update']);
Route::get('/members/delete/{id}', [MemberController::class, 'destroy']);

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create',[TaskController::class, 'create']);
Route::post('/tasks/store',[TaskController::class, 'store']);
Route::get('/tasks/edit/{id}',[TaskController::class, 'edit']);
Route::put('/tasks/update/{id}',[TaskController::class, 'update']);
Route::get('/tasks/delete/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks/show/{id}', [TaskController::class, 'show']);

Route::post('/submissions/store', [SubmissionController::class, 'store']);
