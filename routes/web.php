<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'albums', 'as' => 'album.'],function (){
    Route::get('/',[AlbumController::class,'index'])->name('index');
    Route::get('/create',[AlbumController::class,'create'])->name('create');
    Route::post('/store',[AlbumController::class,'store'])->name('store');
    Route::get('/edit/{uuid}',[AlbumController::class,'edit'])->name('edit');
    Route::put('/update/{uuid}',[AlbumController::class,'update'])->name('update');
    Route::delete('/delete',[AlbumController::class,'delete'])->name('delete');
    Route::delete('delete-img/{imgUuid}',[AlbumController::class,'deleteImg'])->name('delete-img');
});
