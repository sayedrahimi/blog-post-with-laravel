<?php

use App\Http\Controllers\AboutController ;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\SettingMiddleware;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;


Route::middleware(SettingMiddleware::class)->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('show/{slug}',[HomeController::class,'show'])->name('home.show');

Route::get('/about',[AboutController::class,'frontendIndex'])->name('about');

Route::get('/contact',[ContactController::class,'index'])->name('contact');

Route::get('/test',function(){
    return User::find(1)->post;
});

});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');;

    Route::resource('index',PostController::class);
    Route::get('trash',[PostController::class,'trash'])->name('post.trash');
    Route::delete('deleteFromTrash/{index}',[PostController::class,'deleteFromTrash'])->name('post.deleteFromTrash');
    Route::get('restore/{index}',[PostController::class,'restore'])->name('post.restore');
    Route::get('admin/about',[AboutController::class,'index'])->name('admin.about');

    Route::get('/post/search',[PostController::class,'search'])->name('post.search');

    Route::post('/about/store',[AboutController::class,'store'])->name('about.store');

    Route::get('setting',[SettingController::class,'index'])->name('setting');
    Route::post('setting',[SettingController::class,'store'])->name('setting.store');

    Route::get('/users',[UsersController::class,'index'])->name('user');
    Route::get('/create',[UsersController::class,'create'])->name('user.create');
    Route::post('/users',[UsersController::class,'store'])->name('user.store');
    Route::get('user/edit/{id}',[UsersController::class,'edit'])->name('user.edit');
    Route::post('user/update/{id}',[UsersController::class,'updata'])->name('user.update');
    Route::get('user/delete/{id}',[UsersController::class,'destory'])->name('user.delete');



});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('delete/{index}',[PostController::class,'destroy'])->name('delete');

require __DIR__.'/auth.php';
