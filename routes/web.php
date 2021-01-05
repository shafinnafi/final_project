<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveSearch;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\jsonController;
use App\Http\Controllers\downloadspdf;

use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckStatus;
use App\Http\Controllers\CustomerController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\signups;







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

// Route::get('/live_search', 'LiveSearch@index');
// Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

// Route::get('/live_search', [LiveSearch::class,'index']);
Route::get('/live_search/action', [LiveSearch::class,'action'])->name('live_search.action');


// Route::get('/sendemail', 'SendEmailController@index');
// Route::post('/sendemail/send', 'SendEmailController@send');

Route::get('/sendemail', [SendEmailController::class,'index']);
Route::post('/sendemail', [SendEmailController::class,'send']);
Route::get('/product', [ProductController::class,'index']);

Route::get('/login', [loginController::class,'index'])->name('login');
Route::post('/login', [loginController::class,'action']);

Route::get('/logout', [logoutController::class,'index'])->name('logout');


//jc
Route::get('/laravel-json', [JsonController::class,'index']);
Route::post('/store-json', [JsonController::class,'store']);

Route::get('/invoice', [downloadspdf::class,'index']);
Route::get('/invoice/pdf', [downloadspdf::class,'pdf']);




// Route::get('/employee', 'EmployeeController@index')->name('employee.index');


// Route::middleware([CheckStatus::class])->group(function(){
//     Route::get('home', [HomeController::class,'home']);
//     });


Route::group(['middleware'=>['sess']], function(){

    Route::get('/employee', [EmployeeController::class,'index'])->name('employee.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [ProductController::class, 'store']);
    
    Route::get('/productlist', [ProductController::class, 'productlist'])->name('home.productlist');

    
    Route::get('/livesearch', function () {
        return view('live_search');
    });
    Route::get('/invoice', [downloadspdf::class,'index']);
    
	
});

// Route::Resource ('customers','CustomerController');
// Route::get('/customers', [CustomerController::class,'index']);
// // Route::get('/customers/create', [CustomerController::class,''])->('customer.create');
// Route::get('/customer/create', function () {
//     return view('customers.create');
// })->name('customers.create');

// Route::get('/customers/destory', [CustomerController::class,'destroy'])->name('customer.destroy');


// Route::get('/customer/store', function () {
//     return view('customers.store');
// })->name('customers.store');

// Route::post('/customer/store', function () {
//     return view('customers.store');
// })->name('customers.store');

// Route::get('/customer/store', [CustomerController::class,'store'])->name('customers.store');

Route::get('/signup', function () {
    return view('signup');
});


// Route::post('/customer/store', [CustomerController::class,'index'])->name('customer.store');


Route::resource('/blogs', BlogController::class);




Route::get('/login/facebook', [signups::class,'redirectToProvider']);
Route::get('/login/facebook/callback', [signups::class,'handleProviderCallback']);

