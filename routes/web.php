<?php
use App\Mail\SysMail;

use App\Models\Rollpayment;
use App\Models\RollpaymentBones;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CheckUseridController;
use App\Http\Controllers\EmailreportController;
use App\Http\Controllers\RollpaymentController;
use App\Http\Controllers\DisBonesRoleController;
use App\Http\Controllers\PersonalpageController;
use App\Http\Controllers\TimescheduleController;
use App\Http\Controllers\FinanceDegreeController;
use App\Http\Controllers\AlluserpaymentController;
use App\Http\Controllers\UsersmoredetailsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
/// to enbale lang transalte from aribic to english //////////////////////////////////////
   /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
   Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



        //..add start code for .the route in whole project for example




        Route::get('/welcome', function () {
            return view('welcome');
        });
        Route::get('/checklogin2', function () {
            return view('auth.logincheck');
        });
        Route::get('checklogin',[CheckUseridController::class,'index'])->name('checklogin1');

        Route::POST('/checklogin',[CheckUseridController::class,'comapre'])->name('checkid');
        Route::get('/tt', function () {
           Storage ::disk('imgfolder')->put('text.txt','welcome');
           return "ok";
        });


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




///// restric these routes for the super admin only users role type



Route::middleware (['auth','check.role_superadmin'])->group(
    function(){




///// restric these routes for the viewer users role type


////////////route for superadmin _settingcreate start roles routes////////////////
Route::resource('/roles',RolesController::class);
route::post('roles/update/{id}',[RolesController::class,'update'])->name('roles.edit');
Route::get('/roles/delete/{id}', [RolesController::class, 'destroy'])->name('role.destroy');
////////////route for  superadmin _settingcreate start roles routes end ////////////////
////////////route for superadmin _settingcreate start roles routes////////////////
Route::resource('/timeschdule',TimescheduleController::class);
Route::get('/timeschdule/show/{id}', [TimescheduleController::class, 'show'])->name('timeschdule.show');
route::post('timeschdule/update/{id}',[TimescheduleController::class,'update'])->name('timeschdule.edit');
Route::get('/timeschdule/delete/{id}', [TimescheduleController::class, 'destroy'])->name('timeschdule.destroy');
////////////route for  user _settingcreate start roles routes end ///////////////
////////////route for admin _settingcreate start roles routes////////////////




   Route::resource('/dis_roles',DisBonesRoleController::class);





route::post('dis_roles/update/{id}',[DisBonesRoleController::class,'update'])->name('dis_roles.edit');
Route::get('/dis_roles/delete/{id}', [DisBonesRoleController::class, 'destroy'])->name('dis_roles.destroy');
////////////route for  admin _settingcreate start roles routes end ////////////////
////////////route for admin _settingcreate start roles routes////////////////
Route::resource('/finan_info',FinanceDegreeController::class);
route::post('finan_info/update/{id}',[FinanceDegreeController::class,'update'])->name('finan_info.edit');
Route::get('/finan_info/delete/{id}', [FinanceDegreeController::class, 'destroy'])->name('finan_info.destroy');
////////////route for  admin _settingcreate start roles routes end ////////////////
///// restric these routes for the  and only superadmin users role type

});///
///// restric these routes for only superadmin users role type
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////


///// restric these routes for the viewer users role type

Route::middleware (['auth','check.role_admin'])->group(
    function(){

///// restric these routes for the viewer users role type


////////////route for dashboard create start users////////////////
Route::resource('/users',UserController::class);

Route::get('/users/show_all', [UserController::class, 'show'])->name('user.show');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
route::post('users/update/{id}',[UserController::class,'update'])->name('user.edit');
route::post('users/resetpass/{id}',[UserController::class,'reset_pass'])->name('user.password_reset');

route::post('users/importExcel',[UserController::class,'import'])->name('user.bulkimport');
route::post('users/updateExcel',[UserController::class,'updateimport'])->name('user.updateimport');
Route::get('export-users', [UserController::class, 'export'])->name('users.export');
Route::POSt('selectitems', [UserController::class, 'deleteSelected'])->name('user_select');
////////////route for dashboard create end users////////////////



////////////route for user _settingcreate start roles routes////////////////
Route::resource('/payment_bones',RollpaymentController::class);
Route::get('/payment_bones/show/{id}', [RollpaymentController::class, 'show'])->name('payment_bones.show');
route::post('payment_bones/update/{id}',[RollpaymentController::class,'update'])->name('payment_bones.edit');
Route::get('/payment_bones/delete/{id}', [RollpaymentController::class, 'destroy'])->name('payment_bones.destroy');
////////////route for  user _settingcreate start roles routes end ////////////////
////////////route for alluser _settingcreate start roles routes////////////////
Route::resource('/all_payments',AlluserpaymentController::class);
Route::get('/all_payments/show/{id}', [AlluserpaymentController::class, 'show'])->name('all_payments.show');
route::post('all_payments/update/{id}',[AlluserpaymentController::class,'update'])->name('all_payments.edit');
route::post('all_payments',[AlluserpaymentController::class,'search'])->name('all_payments.ser');

Route::get('/all_payments/delete/{id}', [AlluserpaymentController::class, 'destroy'])->name('all_payments.destroy');

Route::post('/bluckemail', [AlluserpaymentController::class, 'bluckemail'])->name('all_payments.email');



////////////route for all _settingcreate start roles routes end ////////////////



////////////route for user _settingcreate start roles routes////////////////
Route::resource('/emails_report',EmailreportController::class);
Route::get('/emails_report',[EmailreportController::class, 'index'])->name('emailslogs');
Route::get('/emails_report/show/{id}', [EmailreportController::class, 'show'])->name('emails_report.show');
route::post('emails_report/update/{id}',[EmailreportController::class,'update'])->name('emails_report.edit');
Route::get('/emails_report/delete/{id}', [EmailreportController::class, 'destroy'])->name('emails_report.destroy');
route::post('emails_report',[EmailreportController::class,'search1'])->name('emails_report.ser');
Route::get('/emails_report2/delete_ALL', [EmailreportController::class, 'destroy2'])->name('emails_report2.destroy2');

////////////route for  user _settingcreate start roles routes end ////////////////

////////////route for user setting create start roles routes////////////////
Route::resource('/',PersonalpageController::class);
Route::get('/users_details/show/{id}', [UsersmoredetailsController::class, 'show'])->name('users_details.show');
Route::get('/users_details/deletefile/{id}', [UsersmoredetailsController::class,  'clearFilePath'])->name('deletefile');
Route::get('/users_details/deleteimg/{id}', [UsersmoredetailsController::class,  'clearFilePathimg'])->name('deleteimg');
route::post('users_details/update/{id}',[UsersmoredetailsController::class,'update'])->name('users_details.edit');
Route::get('/users_details/delete/{id}', [UsersmoredetailsController::class, 'destroy'])->name('users_details.destroy');
route::post('users_details',[UsersmoredetailsController::class,'search3'])->name('users_details.ser');
Route::get('/logout5', [UsersmoredetailsController::class, 'logout5'])
->name('logout5');
////////////route for  user _settingcreate start roles routes end ////////////////
///// restric these routes for the viewer users role type
///// restric these routes for the  and only superadmin users role type

});///
///// restric these routes for only superadmin users role type
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////

///// restric these routes for the viewer users role type
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
////////////route for user viewer create start roles routes////////////////
Route::resource('/personal',PersonalpageController::class);
Route::get('/personal/show/{id}', [PersonalpageController::class, 'show'])->name('personal.show');
route::post('personal/update/{id}',[PersonalpageController::class,'update'])->name('personal.edit');
Route::get('/personal/delete/{id}', [PersonalpageController::class, 'destroy'])->name('personal.destroy');
route::post('personal',[PersonalpageController::class,'search3'])->name('personal.ser');
Route::get('/logout2', [PersonalpageController::class, 'gg'])
->name('logout2');
Route::get('/users_details/show/{id}', [UsersmoredetailsController::class, 'show'])->name('users_details.show');
Route::get('/users_details/deletefile/{id}', [UsersmoredetailsController::class,  'clearFilePath'])->name('deletefile');
Route::get('/users_details/deleteimg/{id}', [UsersmoredetailsController::class,  'clearFilePathimg'])->name('deleteimg');
route::post('users_details/update/{id}',[UsersmoredetailsController::class,'update'])->name('users_details.edit');
////////////route for  user _sviewer create start roles routes end ////////////////









      // Route::get('/{page}',[AdminController::class,'index']);
 //..add code end for .the route in whole project for example
    });
});
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//// to enbale lang transalte from aribic to english //////////////////////////////////////








require __DIR__.'/auth.php';
////////////dashboard controller start logic////////////


Route::get('/{page}',[AdminController::class,'index']);
////////////dashboard controller end  logic////////////
////////////mail start logic////////////
Route::get('/send', function () {
    $recipient='h.karim@mcomm.cu.edu.eg';

    Mail::to($recipient)->send(new Sysmail([
      'title' => 'The Title',
      'body' => 'The Body',
  ]));
  return "email sent";
  })->middleware(['auth', 'verified']);





//////////// mail end send logic///////////
