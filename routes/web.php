<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\FundraisingController;
use App\Http\Controllers\FundraisingPhaseController;
use App\Http\Controllers\FundraisingWithdrawalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
        Route::resource('donors', DonorController::class)->middleware('role:owner');
        Route::resource('fundraisers', FundraiserController::class)->middleware('role:owner')->except('index');

        Route::resource('fundraising-withdrawals', FundraisingWithdrawalController::class)->middleware('role:owner|fundraiser');
        Route::post('fundraising-withdrawals/request/{fundraising}', [FundraisingWithdrawalController::class, 'store'])->middleware('role:fundraiser')->name('fundraising-withdrawals.store');

        Route::resource('fundraising-phases', FundraisingPhaseController::class)->middleware('role:owner|fundraiser');
        Route::post('fundraising-phases/update/{fundraising}', [FundraisingPhaseController::class, 'update'])->middleware('role:fundraiser')->name('fundraising-phases.update');

        Route::resource('fundraisings', FundraisingController::class)->middleware('role:owner|fundraiser');
        Route::post('fundraisings/active/{fundraising}', [FundraisingController::class, 'activateFundraising'])->middleware('role:owner')->name('fundraisings.activate-fundraising');

        Route::post('fundraiser/apply', [DashboardController::class, 'applyFuindraiser'])->name('fundraiser.apply');
        Route::get('my-withdrawals', [DashboardController::class, 'myWithdrawals'])->name('my-withdrawals');
        Route::get('my-withdrawals/{fundraisingWithdrawal}', [DashboardController::class, 'myWithdrawalsDetails'])->name('my-withdrawals.details');

    });
});

require __DIR__.'/auth.php';
