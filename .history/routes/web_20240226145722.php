<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
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
/* This line of code is defining a GET route for the root URL ('/') of the application. When a user
accesses the root URL, it will call the 'index' method of the 'HomeController' class. Additionally,
the route is given the name 'home' which can be used to reference this route in the application. */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //post
    Route::get('/admin/post/list', [PostController::class, 'view'])->name('post.view');
    Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/post/edit/{postid}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/admin/post/edit/{postid}', [PostController::class, 'update'])->name('post.update');
    Route::get('/admin/post/delete/{postid}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/admin/post/viewpost/{postid}', [PostController::class, 'viewpost'])->name('post.viewpost');
    Route::post('/admin/post/addComment', [PostController::class, 'commentStore'])->name('comment.store');
    //home
    Route::get('/admin',[HomeController::class,'getData'])->name('table');
});

require __DIR__.'/auth.php';
