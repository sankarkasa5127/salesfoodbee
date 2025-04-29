<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ThemepreviewController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReportController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/auth/user/{token}',[LoginController::class, 'autoLogin'])->name('auto_login');
Route::get('/print/{orderId}',[OrderController::class, 'print'])->name('print');
Auth::routes();
Route::get('/pusher', [App\Http\Controllers\PusherController::class, 'index'])->name('pusher');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_custom', [LoginController::class, 'customLogin'])->name('login_custom');
Route::get('/logout',[LoginController::class,"logout"])->name("logout");
Route::get('/forget-password',[ForgotPasswordController::class,"showForgetPasswordForm"])->name("forget_password");

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/week_data', [DashboardController::class, 'weekdata'])->name('week_data');
Route::get('/month_data', [DashboardController::class, 'monthdata'])->name('month_data');
Route::get('/today_data', [DashboardController::class, 'todaydata'])->name('today_data');
Route::get('/piedata', [DashboardController::class, 'pie_data'])->name('piedata');

Route::post('/view_order_details', [OrderController::class, 'view_order_detail'])->name('view_order_details');

Route::post('/view_order_pusher', [OrderController::class, 'getpusher_data'])->name('view_order_pusher');

Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');


Route::post('/filter_reservation', [ReservationController::class, 'filterReservation'])->name('filter_reservation');

Route::post('/pusher_popup', [DashboardController::class, 'pusherOrderPopup'])->name('pusher_popup');

Route::post('/pusher_popup_order_status', [DashboardController::class, 'mainOrderstatus'])->name('pusher_popup_order_status');

Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation_index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/all-orders', [OrderController::class, 'AllOrders'])->name('AllOrders');
Route::post('/filter-orders', [OrderController::class, 'filter'])->name('filter_orders');
Route::post('/date-filter-reservation', [ReservationController::class, 'date_filter'])->name('filter_orders_reservation');
Route::post('/search_orders', [OrderController::class, 'search'])->name('search_orders');
Route::post('/search-booking', [ReservationController::class, 'search_bookings'])->name('search_booking');

Route::post('/statusUpdate', [ReservationController::class, 'statusUpdate'])->name('statusUpdate');

Route::post('/order_status_update', [OrderController::class, 'Order_status'])->name('order_status_update');

Route::post('/push-reservation', [ReservationController::class, 'pushReservation'])->name('push_reservation');

Route::get('/all-reservation', [ReservationController::class, 'allbooking'])->name('all_reservation');
Route::get('/get-all-reservation', [ReservationController::class, 'getallbooking'])->name('get_all_reservation');
Route::post('/send_custom_email', [ReservationController::class, 'send_custom_email'])->name('send_custom_email');

Route::get('/get-orders', [OrderController::class, 'getallordersview'])->name('get_orders');
Route::get('/get-all-orders', [OrderController::class, 'getallorders'])->name('get_all_orders');


Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::post('items/changemenu', [ItemController::class, 'changemenu']);
Route::post('items/changemenuitem', [ItemController::class, 'changemenuitem']);
Route::get('items/getCatById', [ItemController::class, 'getCatById'])->name('getCatById');
Route::post('items/cat_update', [ItemController::class, 'cat_update']);
Route::get('/items/product/{id}', [ItemController::class, 'product_edit'])->name('product_edit');
Route::post('items/product_update', [ItemController::class, 'product_update']);
Route::get('/items/menubuilder', [ItemController::class, 'menubuilder'])->name('menubuilder');

Route::post('/pro-status', [ItemController::class, 'status_active'])->name('pro_status');

Route::post('/priceUpdate', [ItemController::class, 'updateproductbyid'])->name('priceUpdate');

Route::post('/restaurent_status', [DashboardController::class, 'RestorentsStatus'])->name('restaurent_status');

Route::post('/paypal_status', [DashboardController::class, 'paypalStatus'])->name('paypal_status');
Route::post('/cod_status', [DashboardController::class, 'codStatus'])->name('cod_status');

Route::post('/pickup_status', [DashboardController::class, 'pickupStatus'])->name('pickup_status');

Route::post('/delivery_status', [DashboardController::class, 'deliverystatus'])->name('delivery_status');

Route::post('/Reservation-type', [DashboardController::class, 'ReservationStatus'])->name('Reservation_type');

Route::post('/setting_data', [DashboardController::class, 'setting_data'])->name('setting_data');

Route::get('/report/orders', [ReportController::class, 'testing']);
Route::get('/report/orders/ajax', [ReportController::class, 'ajaxcall'])->name('reports.order.ajaxcall');




//-------------theme------------------------//

Route::get('/theme', [ThemeController::class, 'index'])->name('theme');
Route::get('/allThemeas', [ThemeController::class, 'allThemeas'])->name('allThemeas');
Route::post('/theme-save', [ThemeController::class, 'store'])->name('theme_save');
Route::get('/theme-show', [ThemeController::class, 'show'])->name('theme_show');
Route::get('/theme-edit/{id}', [ThemeController::class, 'edit'])->name('theme_edit');
Route::post('/theme-update/{id}', [ThemeController::class, 'update'])->name('theme_update');
Route::get('/theme-delete/{id}', [ThemeController::class, 'destroy'])->name('theme_delete');
Route::post('/export_theme', [ThemeController::class, 'exportTheme'])->name('export_theme');

//-------------website------------------------//

Route::get('/web-img-form', [WebsiteController::class, 'index'])->name('web_img_form');
Route::get('/web-img-show', [WebsiteController::class, 'create'])->name('web_img_show');
Route::post('/web-img-save', [WebsiteController::class, 'store'])->name('web_img_save');
Route::get('/web-img-delete/{id}', [WebsiteController::class, 'destroy'])->name('web_img_delete');
Route::get('/web-img-edit/{id}',[WebsiteController::class,'edit']);
Route::post('/web-img-update', [WebsiteController::class, 'update'])->name('web_img_update');

Route::get('/compress-img', [WebsiteController::class, 'compress_zip_img'])->name('compress_img');

//---------------------------ThemepreviewController----------------------------//


Route::get('/Theme-1-demo', [ThemepreviewController::class, 'themeStandard'])->name('theme_1_demo');
Route::get('/Theme-2-demo', [ThemepreviewController::class, 'themeOmega'])->name('theme_2_demo');
Route::get('/Theme-3-demo', [ThemepreviewController::class, 'themeUltra'])->name('theme_3_demo');
Route::get('/Theme-4-demo', [ThemepreviewController::class, 'themeDiamand'])->name('theme_4_demo');
Route::get('/Theme-5-demo', [ThemepreviewController::class, 'themeSilver'])->name('theme_5_demo');


//---------------------------Menu Controller----------------------------//
Route::get('/menu-form', [MenuController::class, 'index'])->name('menu_form');
Route::post('/menu-product', [MenuController::class, 'store'])->name('menu_product');
Route::post('/menu-category', [MenuController::class, 'category'])->name('menu_category');

Route::get('/menu-edit/{id}', [MenuController::class, 'edit'])->name('menu_edit');
Route::post('/menu-update/{id}', [MenuController::class, 'update'])->name('menu_update');
Route::get('/menu-delete/{id}', [MenuController::class, 'destroy'])->name('menu_delete');






Route::post('theme-download', [ThemeController::class, 'DownloadTheme'])->name('theme_download');
Route::post('booking-save', [ThemeController::class, 'booking_slot'])->name('booking_save');




Route::post('asset_download', [ThemeController::class, 'download_asset'])->name('asset_download');



Route::get("test123", function(){
	return view('test');
});	


