<?php

use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Models\DetailPlan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {
    /**
     * Route Detail Plans
     */
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');


    /**
     * Route Plans
     */
    
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');

    /**
     * Route Dashboard
     */
    Route::get('admin', [PlanController::class, 'index'])->name('admin.index');
});