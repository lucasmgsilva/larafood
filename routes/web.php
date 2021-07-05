<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\SiteController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/plan/{ul}', [SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/', [SiteController::class, 'index'])->name('site.home');

Route::prefix('admin')->middleware('auth')->group(function () {
    /**
     * Route Users
     */
    Route::any('users/search', [UserController::class, 'search'])->name('users.search');
    Route::resource('users', UserController::class);
    
    
    /**
     * Permission x Profile
     */

    Route::get('plans/{id}/profiles/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profiles.detach');
    Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', [PlanProfileController::class, 'index'])->name('plans.profiles.index');
    Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
    
    /**
     * Profile x Permission
     */

    Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');
    
    /**
     * Permission x Profile
     */

    Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permissions.detach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'index'])->name('profiles.permissions.index');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');

    
    /**
     * Route Permissions
     */
    Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::resource('permissions', PermissionController::class);
    
    /**
     * Route Profiles
     */
    Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', ProfileController::class);

    /**
     * Route Detail Plans
     */
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plans/{url}/details/{id}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::put('plans/{url}/details/{id}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{url}/details/{id}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::delete('plans/{url}/details/{id}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');


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