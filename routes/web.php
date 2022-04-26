<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;

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

    // Route::get('login', [AuthController::class, 'index'])->name('login');
    // Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
    // Route::get('registration', [AuthController::class, 'registration'])->name('register');
    // Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
    // Route::get('dashboard', [AuthController::class, 'dashboard']); 
    // Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    
    //======================================================================================

    // Route::get('/registration', [LoginController::class, 'registration'])->name('register');
    // Route::post('/post-registration', [LoginController::class, 'postRegistration'])->name('register.post'); 

    // Route::get('/login', [LoginController::class, 'login_index'])->name('login');
    // Route::post('/post-login', [LoginController::class, 'postLogin'])->name('login.post'); 

    // Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/', [IndexController::class, 'index'])->name('index.show');
    Route::get('portfolio', [IndexController::class, 'portfolio'])->name('index.portfolio');
    Route::get('product', [IndexController::class, 'product'])->name('index.product');
    Route::get('service', [IndexController::class, 'service'])->name('index.service');
    Route::get('team', [IndexController::class, 'team'])->name('index.team');
    Route::get('about-us', [IndexController::class, 'about_us'])->name('index.about');
    Route::get('career', [IndexController::class, 'career'])->name('index.career');
    Route::get('client', [IndexController::class, 'client'])->name('index.client'); 
    Route::get('company-profile', [IndexController::class, 'company_profile'])->name('index.company'); 
    Route::get('contact-us', [IndexController::class, 'contact'])->name('index.contact'); 
    

// Route::group(['middleware'=>['sessionVerify']] , function(){
//     Route::group(['middleware'=>['userType']] , function(){

//         Route::get('/customer-dashboard', [CustomerController::class, 'customer_dashboard'])->name('customer.dashboard');

//     });
// });