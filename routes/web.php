<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Middleware\RedirectIfAuthenticated;

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

// All frontend route
Route::get('/',[UserController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
   Route::get('/user/profile',[UserController::class,'UserProfile'])->name('user.profile');
   Route::post('/user/profile/update',[UserController::class,'UserProfileUpdate'])->name('user.profile.update');
   Route::get('/user/logout',[UserController::class,'UserLogout'])->name('user.logout');
   Route::get('/user/change_password',[UserController::class,'ChangeUserPassword'])->name('change.user.password');
   Route::post('/user/update_password',[UserController::class,'UpdateUserPassword'])->name('update.user.password');
});

require __DIR__.'/auth.php';

//Admin Group Middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update',[AdminController::class,'AdminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change_password',[AdminController::class,'ChangeAdminPassword'])->name('admin.change.password');
    Route::post('/admin/update_password',[AdminController::class,'UpdateAdminPassword'])->name('update.admin.password');
});

Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

//Agent Group Middleware
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard',[AgentController::class,'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout',[AgentController::class,'AgentLogout'])->name('agent.logout');
    Route::get('/agent/profile',[AgentController::class,'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile/update',[AgentController::class,'AgentProfileUpdate'])->name('agent.profile.update');
    Route::get('/agent/change_password',[AgentController::class,'ChangeAgentPassword'])->name('agent.change.password');
});

Route::get('/agent/login',[AgentController::class,'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/agent/register',[AgentController::class,'AgentRegister'])->name('agent.register');

Route::middleware(['auth','role:admin'])->group(function(){
    // Property Type All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/type','AddType')->name('add.type');
        Route::post('/store/type','StoreType')->name('store.type');
        Route::get('/edit/type/{id}','EditType')->name('edit.type');
        Route::post('/update/type','UpdateType')->name('update.type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete.type');
    });
    // Amenities All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/amenitie','AllAmenitie')->name('all.amenitie');
        Route::get('/add/amenitie','AddAmenitie')->name('add.amenitie');
        Route::post('/store/amenitie','StoreAmenitie')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit.amenitie');
        Route::post('/update/amenitie','UpdateAmenitie')->name('update.amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete.amenitie');
    });

    // Property All Route
    Route::controller(PropertyController::class)->group(function(){
        Route::get('/all/property','AllProperty')->name('all.property');
        Route::get('/add/property','AddProperty')->name('add.property');
        Route::post('/store/property','StoreProperty')->name('store.property');
        Route::get('/edit/property/{id}','EditProperty')->name('edit.property');
        Route::post('/update/property','UpdateProperty')->name('update.property');
        Route::post('/update/property/thumbnail','UpdatePropertyThumbnail')->name('update.property.thumbnail');
        Route::post('/update/property/multiimage','UpdatePropertyMultiImage')->name('update.property.multiimage');
        Route::get('/delete/property/multiimage/{id}','DeletePropertyMultiImage')->name('delete.property.multiimage');
        Route::post('/store/new/multiimage','StoreNewMultiImage')->name('store.new.multiimage');
        Route::post('/update/property/facility','UpdatePropertyFacility')->name('update.property.facility');
        Route::get('/delete/property/{id}','DeleteProperty')->name('delete.property');
        Route::get('/details/property/{id}','DetailsProperty')->name('details.property');
        Route::post('/inactive/property','InActiveProperty')->name('inactive.property');
        Route::post('/active/property','ActiveProperty')->name('active.property');
       
    });
});
