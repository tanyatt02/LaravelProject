<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Mail\HI;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;

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


//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('comments', AdminCommentController::class);
 });

 Route::get('/categories', [CategoryController::class, 'index'])
 ->name('categories');
 Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('id','\d+')
    ->name('news.show');
Route::get('/news/{category}/{id}', [NewsController::class, 'indexCategory'])
    ->where('id','\d+')
    ->name('news.indexCategory');
// Route::post('/news/comment', [CommentController::class, 'create'])
//     ->name('comment.create');
//Route::post('/news/comment', [CommentController::class, 'store'])
   // ->name('comment.store');
Route::get('/news/store', [NewsController::class, 'store'])
    ->name('news.store');


Route::resource('comment', CommentController::class);


Route::get('/', [MainController::class, 'menu']);

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');



// // Route::get('/testmail', function() {
// //     Mail::raw('Привет мир!', function($message) {
// //         $message
// //         ->to('test@test.com')
// //         ->from('admin@example.com')
// //         ->subject('Проверка сообщения');
// //     });
// // });

// Route::get('/testmail', function() {
//     Mail::to('test@test.com')->send(new HI);
// });

// Route::get('/name/{name}', function(string $name){
//     return "Hello, {$name}";
// });

