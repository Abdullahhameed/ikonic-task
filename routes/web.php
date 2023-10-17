<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FeedBackController as AdminFeedBackController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware('verified')->name('dashboard');

        Route::get('/feedbacks', [AdminFeedBackController::class, 'index'])->name('feedbacks');
        Route::get('/feedback/delete/{feedback}', [AdminFeedBackController::class, 'destroy'])->name('feedback-destroy');
        
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/user/delete/{user}', [UserController::class, 'destroy'])->name('user-destroy');
        
        Route::get('/comments', [CommentController::class, 'index'])->name('comments');
        Route::get('/comment/delete/{comment}', [CommentController::class, 'destroy'])->name('comment-destroy');
        Route::post('/comment/toggle', [CommentController::class, 'toggleComment']);

    });
    Route::get('/create/feedback', [FeedbackController::class, 'create'])->name('create-feedback');
    Route::post('/save/feedback', [FeedbackController::class, 'store'])->name('save-feedback');
    Route::get('/comment/feedback/{feedback}', [FeedbackController::class, 'comment'])->name('comment-feedback');
    Route::post('/save/feedback/comment/{feedback}', [FeedbackController::class, 'saveComment'])->name('save-comment');
    Route::post('/vote', [FeedbackController::class, 'vote'])->name('vote');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
