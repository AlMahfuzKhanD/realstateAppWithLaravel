<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Agent\AgentPropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;

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

    Route::controller(WishlistController::class)->group(function(){
        Route::get('/user/wishlist','UserWishList')->name('user.wishlist');
        Route::get('/get-wishlist-property','GetWishListProperty');
        Route::get('/remove-from-wishlist/{id}','RemoveFromWishlist');
    });

    Route::controller(CompareController::class)->group(function(){
        Route::get('/user/compare','UserCompare')->name('user.compare');
        Route::get('/get-compare-property','GetCompareProperty');
        Route::get('/remove-from-compare/{id}','RemoveFromCompare');
    });
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
    Route::post('/agent/update_password',[AgentController::class,'UpdateAgentPassword'])->name('update.agent.password');
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
    // State All Route
    Route::controller(StateController::class)->group(function(){
        Route::get('/all/state','AllState')->name('all.state');
        Route::get('/add/state','AddState')->name('add.state');
        Route::post('/store/state','StoreState')->name('store.state');
        Route::get('/edit/state/{id}','EditState')->name('edit.state');
        Route::post('/update/state','UpdateState')->name('update.state');
        Route::get('/delete/state/{id}','DeleteState')->name('delete.state');
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
        Route::get('/admin/package/history','AdminPackageHistory')->name('admin.package.history');
        Route::get('/admin/package/invoice/{id}','PackageInvoice')->name('package.invoice');
        Route::get('/admin/property/message','AdminPropertyMessage')->name('admin.property.message');
        Route::get('/admin/message/details/{id}','AdminMessageDetails')->name('admin.message.details');
       
    });

    // Agent All Route from admin
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/agent','AllAgent')->name('all.agent');
        Route::get('/add/agent','AddAgent')->name('add.agent');
        Route::post('/store/agent','StoreAgent')->name('store.agent');
        Route::get('/edit/agent/{id}','EditAgent')->name('edit.agent');
        Route::get('/delete/agent/{id}','DeleteAgent')->name('delete.agent');
        Route::post('/update/agent','UpdateAgent')->name('update.agent');
        Route::get('/changeStatus','ChangeStatus');
    });
}); // Admin Middleware


//Agent Group Middleware
Route::middleware(['auth','role:agent'])->group(function(){

    // Agent all property
    Route::controller(AgentPropertyController::class)->group(function(){ 
        Route::get('/all/agent/property','AllAgentProperty')->name('all.agent.property');
        Route::get('/add/agent/property','AddAgentProperty')->name('add.agent.property');
        Route::post('/store/agent/property','StoreAgentProperty')->name('store.agent.property');
        Route::get('/edit/agent/property/{id}','EditAgentProperty')->name('edit.agent.property');
        Route::post('/update/agent/property','UpdateAgentProperty')->name('update.agent.property');
        Route::post('/update/agent/property/thumbnail','UpdateAgentPropertyThumbnail')->name('update.agent.property.thumbnail');
        Route::post('/update/agent/property/multiimage','UpdateAgentPropertyMultiImage')->name('update.agent.property.multiimage');
        Route::get('/delete/agent/property/multiimage/{id}','DeleteAgentPropertyMultiImage')->name('delete.agent.property.multiimage');
        Route::post('/store/agent/new/multiimage','StoreAgentNewMultiImage')->name('store.agent.new.multiimage');
        Route::post('/update/agent/property/facility','UpdateAgentPropertyFacility')->name('update.agent.property.facility');
        Route::get('/details/agent/property/{id}','DetailsAgentProperty')->name('details.agent.property');
        Route::get('/delete/agent/property/{id}','DeleteAgentProperty')->name('delete.agent.property');
        Route::get('/agent/property/message','AgentPropertyMessage')->name('agent.property.message');
        Route::get('/agent/message/details/{id}','AgentMessageDetails')->name('agent.message.details');
    });

    // Agent buy package
    Route::controller(AgentPropertyController::class)->group(function(){ 
        Route::get('/buy/package','BuyPackage')->name('buy.package');
        Route::get('/buy/business/Plan','BuyBusinessPlan')->name('buy.business.plan');
        Route::post('/store/business/Plan','StoreBusinessPlan')->name('store.business.plan');
        Route::get('/buy/professinal/Plan','BuyProfessionaPlan')->name('buy.professional.plan');
        Route::post('/store/professional/Plan','StoreProfessionalPlan')->name('store.professional.plan');
        Route::get('/package/history','PackageHistory')->name('package.history');
        Route::get('/package/invoice/{id}','PackageInvoice')->name('agent.package.invoice');

    });
});

// frontend property details route

Route::get('/property/details/{id}/{slug}',[IndexController::class,'PropertyDetails']);
Route::post('/add-to-wishList/{property_id}',[WishlistController::class,'AddToWishList']);
Route::post('/add-to-compare/{property_id}',[CompareController::class,'AddToCompare']);
Route::post('/property/message',[IndexController::class,'PropertyMessage'])->name('property.message');
Route::get('/agent/details/{id}',[IndexController::class,'AgentDetails'])->name('agent.details');
Route::get('/rent/property',[IndexController::class,'RentProperty'])->name('rent.property');
Route::get('/buy/property',[IndexController::class,'BuyProperty'])->name('buy.property');
Route::get('/property/type/{id}',[IndexController::class,'PropertyType'])->name('property.type');
Route::get('/state/details/{id}',[IndexController::class,'StateDetails'])->name('state.details');
Route::post('/buy/property/search',[IndexController::class,'BuyPropertySearch'])->name('buy.property.search');

