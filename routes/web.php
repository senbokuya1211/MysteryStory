<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LikeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/index',[UserController::class,'index']);
Route::get('/mypage',[UserController::class,'mypage'])->name('mypage');
// Route::get('/form',[UserController::class,'form'])->name('form');
// Route::post('/confirm',[UserController::class,'confirm'])->name('confirm');
Route::get('/stage/{id}',[UserController::class,'stage'])->name('stage');
Route::get('/resetpasscomp',[UserController::class,'resetpasscomp'])->name('resetpasscomp');

Route::post('/stageUp',[StageController::class,'stageUp'])->name('stageUp');
Route::post('/stageEdit/{id}',[StageController::class,'stageEdit'])->name('stageEdit');
Route::post('/stageEditComp',[StageController::class,'stageEditComp'])->name('stageEditComp');
Route::get('/stageForm',[StageController::class,'stageForm'])->name('stageForm');

Route::post('/reviewUp',[ReviewController::class,'reviewUp'])->name('reviewUp');

Route::post('/delete/{id}',[ReviewController::class,'delete'])->name('delete');
Route::post('/edit/{id}',[ReviewController::class,'edit'])->name('edit');
Route::post('/reviewEditComp',[ReviewController::class,'reviewEditComp'])->name('reviewEditComp');

Route::post('/like',[LikeController::class,'like'])->name('reviewLike');

// Route::post('/form','UserController@delete')->name('delete');
// Route::post('/confirm','UserController@send')->name('confirm');
// Route::post('/complete','UserController@result')->name('complete');
// Route::get('/complete','UserController@index');
// Route::get('/edit/{id}','UserController@edit')->name('edit');
// Route::post('/edit/{id?}','UserController@editResult')->name('editResult');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
