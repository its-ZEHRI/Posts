<?php

use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', function () {
    return view('home');
});
Route::get ('/post',             [PostController::class ,      'index'       ]);
Route::get ('/createPost',       [CreatePostController::class, 'index'       ]);
Route::post('/createPost',       [CreatePostController::class, 'create'      ]);
Route::get ('/updatePost/{id}',  [PostController::class,       'EditPage'    ]);
Route::get ('post/{id}',         [PostController::class,       'post'        ]);
Route::post('updatePost',        [PostController::class,       'updatePost'  ]);
Route::get ('/trash',            [TrashController::class,      'index'       ])->name('trash');
Route::get ('/P-deletePost/{id}',[TrashController::class,      'destroyPost' ]);
Route::get ('/restorePost/{id}', [TrashController::class,      'restorePost' ]);
Route::get ('deletePost/{id}',   [PostController::class,       'deletePost'  ])->middleware(['auth', 'password.confirm']);
Route::get ('/dashboard',        [DashboardController::class,  'index'       ]);
Route::get ('/home',             [HomeController::class,       'index'       ])->name('home');

Route::resource('editor', EditorController::class);
