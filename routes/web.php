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
use App\Http\Controllers\MembersController;


use App\Http\Controllers\ProfileController;

use App\Http\Controllers\KeywordsController;

use App\Http\Controllers\StoreItemsController;
use App\Http\Controllers\CheckUseridController;


use App\Http\Controllers\EmailreportController;
use App\Http\Controllers\ItemscreateController;
use App\Http\Controllers\RollpaymentController;
/*
|---------------------------library routs-start---------------------------------------------*/
use App\Http\Controllers\DisBonesRoleController;
use App\Http\Controllers\ItemchaptersController;
use App\Http\Controllers\ItemVersionsController;
use App\Http\Controllers\PersonalpageController;


/*|---------------------------library routs---end-------------------------------------------*/

use App\Http\Controllers\TimescheduleController;
use App\Http\Controllers\FinanceDegreeController;
use App\Http\Controllers\AlluserpaymentController;
use App\Http\Controllers\EcommerceItemsController;
use App\Http\Controllers\ItemsCatogeryController ;
use App\Http\Controllers\SocandCatogeryController;
use App\Http\Controllers\StoreloanItemsController;
use App\Http\Controllers\VersionchaptersController;
use App\Http\Controllers\SharedItemsUsersController;
use App\Http\Controllers\StorestatusItemsController;
use App\Http\Controllers\UsersmoredetailsController;
use App\Http\Controllers\CodelistStoreItmsController;
use App\Http\Controllers\StorecatgeryItemsController;
use App\Http\Controllers\StoreCorruptItemsController;
use App\Http\Controllers\Storestatus2ItemsController;
use App\Http\Controllers\PricelistStorgeItemsController;
use App\Http\Controllers\StorePoorStorgeItemsController;
use App\Http\Controllers\StoreReturnedUsedItemsController;
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

//Route::middleware (['auth','check.role_admin'])->group(
   // function(){

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

//});///
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

///////////////////////////////////////////library system start ///////////////////////////////////

//////////super admin creating start////////////////////////





//////////super admin creating end////////////////////////
////////// codelist item for store creating start////////////////////////
route::resource('/code_list_items',CodelistStoreItmsController::class);
Route::get('/code_list_items/export', [CodelistStoreItmsController::class, 'codesexport'])->name('codelist.export');
route::post('/code_list_items/import',[CodelistStoreItmsController::class,'codesimport'])->name('codestore.bulkimport');


route::post('/code_list_items/update/{id}',[CodelistStoreItmsController::class,'update'])->name('code_list_items.edit');
Route::get('/code_list_items/delete/{id}', [CodelistStoreItmsController::class, 'destroy'])->name('code_list_items.destroy');
////////// codelist item for store creating end////////////////////////


////////// admin creating start////////////////////////
////////// catogeries creating start////////////////////////
route::resource('/catogery',ItemsCatogeryController::class);

route::post('/catogery/update/{id}',[ItemsCatogeryController::class,'update'])->name('catogery.edit');
Route::get('/catogery/delete/{id}', [ItemsCatogeryController::class, 'destroy'])->name('catogery.destroy');
////////// catogeries creating end////////////////////////

////////// keywords creating start////////////////////////
route::resource('/catogery2',SocandCatogeryController::class);

route::post('/catogery2/update/{id}',[SocandCatogeryController::class,'update'])->name('catogery2.edit');
Route::get('/catogery2/delete/{id}', [SocandCatogeryController::class, 'destroy'])->name('catogery2.destroy');
////////// catogeries2 creating end////////////////////////

////////// keywords creating start////////////////////////
route::resource('/keywords',KeywordsController::class);

route::post('/keywords/update/{id}',[KeywordsController::class,'update'])->name('keywords.edit');
Route::get('/keywords/delete/{id}', [KeywordsController::class, 'destroy'])->name('keywords.destroy');
////////// keywords creating end////////////////////////





////////// items creating start////////////////////////
Route::get('/add_new_item/{id}', [ItemscreateController::class, 'show'])->name('item.add');// through catogery page

route::resource('/Itemscreate',ItemscreateController::class);

route::post('/Itemscreate/update/{id}',[ItemscreateController::class,'update'])->name('Itemscreate.edit');
Route::get('/Itemscreate/delete/{id}', [ItemscreateController::class, 'destroy'])->name('Itemscreate.destroy');

//////////items creating end////////////////////////


////////// items chapter creating start////////////////////////
Route::get('/chaptercreate/show/{id}', [ItemchaptersController::class, 'show'])->name('chapter.add');// through catogery page

route::resource('/chaptercreate',ItemchaptersController::class);

route::post('/chaptercreate/update/{id}',[ItemchaptersController::class,'update'])->name('chaptercreate.edit');
Route::get('/chaptercreate/delete/{id}', [ItemchaptersController::class, 'destroy'])->name('chaptercreate.destroy');







//////////library items chapter creating end////////////////////////

////////// items version creating start////////////////////////
Route::get('/add_new_version/{id}', [ItemVersionsController::class, 'show'])->name('itemversion.add');// through catogery page

route::resource('/item_version',ItemVersionsController::class);

route::post('/item_version/update/{id}',[ItemVersionsController::class,'update'])->name('item_version.edit');
Route::get('/item_version/delete/{id}', [ItemVersionsController::class, 'destroy'])->name('item_version.destroy');

//////////items verison creating end////////////////////////

////////// ver chapter creating start////////////////////////
Route::get('/ver_chapter/show/{id}', [VersionchaptersController::class, 'show'])->name('ver_chapter.add');// through catogery page

route::resource('/ver_chapter',VersionchaptersController::class);

route::post('/ver_chapter/update/{id}',[VersionchaptersController::class,'update'])->name('ver_chapter.edit');
Route::get('/ver_chapter/delete/{id}', [VersionchaptersController::class, 'destroy'])->name('ver_chapter.destroy');

//////////library ver chapter creating end////////////////////////


////////// books_loans_mangment creating start////////////////////////
Route::get('/member_loan/show/{id}', [MembersController::class, 'show'])->name('member_loan.add');// through catogery page

route::resource('/member_loan',MembersController::class);

route::post('/member_loan/update/{id}',[MembersController::class,'update'])->name('member_loan.edit');
Route::get('/member_loan/delete/{id}', [MembersController::class, 'destroy'])->name('member_loan.destroy');


//////////book loans mangment creating end////////////////////////




////////// books_public search_mangment creating start////////////////////////
Route::get('/items_show/single/{id}', [EcommerceItemsController::class, 'show'])->name('items_show.single');// through catogery page

route::resource('/items_show',EcommerceItemsController::class);
route::get('/items_show',[EcommerceItemsController::class,'index'])->name('items_show');
route::post('/items_show/update/{id}',[EcommerceItemsController::class,'update'])->name('items_show.edit');
Route::get('/items_show/delete/{id}', [EcommerceItemsController::class, 'destroy'])->name('items_show.destroy');
Route::post('/items_show/search', [EcommerceItemsController::class, 'search'])->name('items_show.search');
Route::post('/items_show/filter', [EcommerceItemsController::class, 'filter'])->name('items_show.filter');
//////////book public search creating end////////////////////////


////////// store_items_loan systems creating start////////////////////////
Route::get('/store_items/single/{id}', [StoreItemsController::class, 'show'])->name('store_items.single');// through catogery page

route::resource('/items_store',StoreItemsController::class);
route::get('/store_items',[StoreItemsController::class,'index'])->name('store_items');
route::post('/store_items/update/{id}',[StoreItemsController::class,'update'])->name('store_items.edit');
Route::get('/store_items/delete/{id}', [StoreItemsController::class, 'destroy'])->name('store_items.destroy');
Route::get('/store_items/show', [StoreItemsController::class, 'show']);

Route::post('/store_items/search', [StoreItemsController::class, 'search'])->name('store_items.search');
Route::post('/store_items/filter', [StoreItemsController::class, 'filter'])->name('store_items.filter');
Route::post('/store_items/filter_users', [StoreItemsController::class, 'filter2'])->name('store_items.filter2');

Route::get('/store_items/filter_users_show', [StoreItemsController::class, 'show2']);
// show single user loans from the store start/////////
Route::get('/store_items/singelstore_info/{id}', [StoreItemsController::class, 'show_info'])->name('singelstore_info');

Route::get('/store_items/store_singel_user_loans', [StoreItemsController::class, 'show_single_user_items']);

// show single items _user loans from the store start/////////


Route::get('/store_items/add_user/{id}', [ StoreloanItemsController::class, 'show'])->name('store_items.add_user');
// show single items _user loans from the store end/////////
////export_single_items_owners_start///////////
Route::get('/store_items/export/{id}', [ StoreloanItemsController::class, 'export_single_items_owners'])->name('store_items.single_export');
////export_single_items_owners_end////////
// show  userس loans from the store start/////////
route::resource('/items_users_store',StoreloanItemsController::class);
Route::get('/items_users_store/delete/{id}', [StoreloanItemsController::class, 'destroy'])->name('items_users_store.destroy');
route::post('/items_users_store/update/{id}',[StoreloanItemsController::class,'update'])->name('items_users_store.edit');
route::post('/items_users_store/return/{id}',[StoreloanItemsController::class,'return'])->name('items_users_store.return');
// show  users loans from the store end/////////




// poor storage returned items route start///
Route::get('/store_items/add_poor_storage_item/{id}', [ StorePoorStorgeItemsController::class, 'show'])->name('store_items.add_poorstorge');
route::resource('/add_poor_storage_item', StorePoorStorgeItemsController::class);
Route::get('/add_poor_storage/delete/{id}', [StorePoorStorgeItemsController::class, 'destroy'])->name('add_poor_storage.destroy');
route::post('/add_poor_storage/update/{id}',[StorePoorStorgeItemsController::class,'update'])->name('add_poor_storage.edit');
// poor storage returned items route end///
//used items route strat///
route::resource('/items_store_used',StoreReturnedUsedItemsController::class);
route::post('/items_store_used/return/{id}',[StoreReturnedUsedItemsController::class,'return'])->name('items_store_reused.return');

//used items route  end///
//////////////////// store_items_loan systems creating start////////////////////////


route::resource('/corrupted_storage_item', StoreCorruptItemsController::class);
route::post('/corrupted_storage_item/returncurrpted/{id}',[StoreCorruptItemsController::class,'returntocurropted'])->name('corrupted_storage_item.returntocorrupt');
route::post('/corrupted_storage_item/return/{id}',[StoreCorruptItemsController::class,'returntoused'])->name('corrupted_storage_item.returntoused');

route::post('/corrupted_storage_item/return_user/{id}',[StoreCorruptItemsController::class,'returntouserc'])->name('corrupted_storage_item.returntouser');


route::post('/corrupted_storage_item2/{id}',[StoreCorruptItemsController::class,'update'])->name('corrupted_storage_item.edit');

////store_catogery/start/////

route::resource('/items_store_catogery',StorecatgeryItemsController::class);

route::post('/items_store_catogery/update/{id}',[StorecatgeryItemsController::class,'update'])->name('items_store_catogery.edit');
Route::get('/items_store_catogery/delete/{id}', [StorecatgeryItemsController::class, 'destroy'])->name('items_store_catogery.destroy');

//////////////store catogery end////////////////////
///store_stauts 1/start/////

route::resource('/items_store_status1',StorestatusItemsController::class);

route::post('/items_store_status1/update/{id}',[StorestatusItemsController::class,'update'])->name('items_store_status1.edit');
Route::get('/items_store_status1/delete/{id}', [StorestatusItemsController::class, 'destroy'])->name('items_store_status1.destroy');

//////////////store staues1 end////////////////////
///store_status2start/////

route::resource('/items_store_status2',Storestatus2ItemsController::class);

route::post('/items_store_status2/update/{id}',[Storestatus2ItemsController::class,'update'])->name('items_store_status2.edit');
Route::get('/items_store_status2/delete/{id}', [Storestatus2ItemsController::class, 'destroy'])->name('items_store_status2.destroy');

//////////////store status2 end////////////////////

//////////////store price list start////////////////////


route::resource('/store_pricelist',PricelistStorgeItemsController::class);
route::resource('/store_pricelist/loaned',PricelistStorgeItemsController::class);
//////////////store price list end////////////////////







//////////guest creating start////////////////////////





//////////guest creating end////////////////////////




///////////////////////////////////////////library system end  ///////////////////////////////////

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
