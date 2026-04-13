<?php

use Illuminate\Support\Facades\Route;

//追加
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Livewire\UserList;
use App\Livewire\UserEdit;
use App\Livewire\UserDelete;
use App\Livewire\InsuranceList;
use App\Livewire\InsuranceEdit;
use App\Livewire\InsuranceDelete;
use App\Livewire\ContentList;
use App\Livewire\ContentEdit;
use App\Livewire\ContentDelete;
use App\Livewire\SaleList;
use App\Livewire\SaleEdit;

// 円グラフ用
use App\Livewire\Piechart;

// 管理カレンダー用
use App\Livewire\KanriCalender;
use App\Livewire\KanriDate;

Route::get('/test',[TestController::class, 'test'])->name('test');
Route::get('post/create',[PostController::class, 'create'])
    ->name('post.create')
    ->middleware('auth');

Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('post', [PostController::class, 'index'])->name('post.index');

Route::get('post/show/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');






//社員
Route::get('/users', UserList::class)->name('users.list');
Route::get('/users/{userID}/edit/', UserEdit::class)->name('users.edit');
Route::patch('users/{userID}', [UserEdit::class, 'update'])->name('users.update');
Route::get('/users/{userID}/delete/', UserDelete::class)->name('users.delete');
Route::get('/users/{userID}', [UserDelete::class, 'delete'])->name('users.delete.check');

//保険会社
Route::get('/insurance', InsuranceList::class)->name('insurance.list');
Route::patch('/insurance', [InsuranceList::class, 'store'])->name('insurance.store');
Route::get('/insurance/{insuranceID}/edit/', InsuranceEdit::class)->name('insurance.edit');
Route::patch('insurance/{insuranceID}', [InsuranceEdit::class, 'update'])->name('insurance.update');
Route::get('/insurance/{insuranceID}/delete/', InsuranceDelete::class)->name('insurance.delete');
Route::get('/insurance/{insuranceID}', [InsuranceDelete::class, 'delete'])->name('insurance.delete.check');

//保険内容
Route::get('/content', ContentList::class)->name('content.list');
Route::patch('/content', [ContentList::class, 'store'])->name('content.store');
Route::get('/content/{contentID}/edit/', ContentEdit::class)->name('content.edit');
Route::patch('content/{contentID}', [ContentEdit::class, 'update'])->name('content.update');
Route::get('/content/{contentID}/delete/', ContentDelete::class)->name('content.delete');
Route::get('/content/{contentID}', [ContentDelete::class, 'delete'])->name('content.delete.check');

//社員の売り上げ設定
Route::get('/sale', SaleList::class)->name('sale.list');
Route::get('/sale/{saleID}/edit/', SaleEdit::class)->name('sale.edit');
Route::patch('sale/{saleID}', [SaleEdit::class, 'update'])->name('sale.update');

// piechart
Route::get('/pie/chart', [Piechart::class, 'chart'])->name('pie.chart');
Route::put('/pie/vote', [Piechart::class, 'vote'])->name('pie.vote');

// 管理カレンダー
Route::get('/kanrical', KanriCalender::class)->name('kanrical.list');
Route::patch('/kanrical', [KanriCalender::class, 'save'])->name('kanrical.save');   //使っていない
Route::get('/kanridate', KanriDate::class)->name('kanridate.index');



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
