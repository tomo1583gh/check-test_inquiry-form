<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryFormController;

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
Route::middleware(['auth'])->group(function () {

    //入力ページ（getとpost両対応）
    Route::match(['get', 'post'], '/', [InquiryFormController::class, 'index'])->name('index');

    //確認ページ
    Route::post('/contact/confirm', [InquiryFormController::class, 'confirm'])->name('contact.confirm');

    //データ保存用のルート（送信処理）
    Route::post('/contact/store', [InquiryFormController::class, 'store'])->name('contact.store');

    //サンクスページ
    Route::get('/contact/thanks', [InquiryFormController::class, 'thanks'])->name('contact.thanks');

    //戻るボタン用ルート
    Route::post('/contact/back', [InquiryFormController::class, 'back'])->name('contact.back');

    //管理ページ
    Route::get('/contact/admin', [InquiryFormController::class, 'admin'])->name('contact.admin');

    Route::get('/contact/export', [InquiryFormController::class, 'export'])->name('contact.export');

    Route::delete('/contact/delete', [InquiryFormController::class, 'delete'])->name('contact.delete');


    Route::get('/contact/{id}', [InquiryFormController::class, 'show'])->name('contact.show');
});
