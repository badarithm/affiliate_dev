<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffiliateController;

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

Route::view('/', 'welcome');
Route::controller(AffiliateController::class)->group(function() {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('affiliate-list', 'form')->name('affiliate.file-upload-form');
    Route::post('affiliate-list', 'affiliateList')->name('affiliate.filtered-list');
});

