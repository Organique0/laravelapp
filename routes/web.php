<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;




Route::prefix('/blog')->group(function () {
    Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show'); //->whereNumber('id');

    //Route::get('/blog/{name}', [PostsController::class, 'show'])->whereAlpha('name');
    //Route::get('/blog/{id}/{name}', [PostsController::class, 'show'])->whereNumber('id')->whereAlpha('name');

    Route::post('/', [PostsController::class, 'store'])->name('blog.store');

    Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');

    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');
});

//Route::resource('/blog', PostsController::class);
Route::get('/', HomeController::class);



//Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
//Route::any('/blog', [PostsController::class, 'index']);

//Return a view
//Route::view('/blog', 'blog.index', ['name' => 'Luka']);


//Fallback Route
Route::fallback(FallbackController::class);
