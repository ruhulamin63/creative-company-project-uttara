<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyProfileController;

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
    Route::get('job-context', [IndexController::class, 'job_context_list'])->name('index.job.context');

    Route::get('client', [IndexController::class, 'client'])->name('index.client'); 
    Route::get('company-profile', [IndexController::class, 'company_profile'])->name('index.company'); 

    Route::get('/contact-us', [IndexController::class, 'contact'])->name('index.contact'); 
    Route::post('/contact-us', [IndexController::class, 'post_contact'])->name('post.index.contact'); 

    //===========================admin panel route========================
    
    Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('invoice', [AdminController::class, 'admin_invoice'])->name('admin.invoice');
    Route::get('data-show', [AdminController::class, 'admin_show_table'])->name('admin.data.show');

    Route::get('service-index', [AdminController::class, 'service_index'])->name('admin.service.index');
    Route::get('service-list', [AdminController::class, 'service_all_data_show'])->name('admin.service.list');


    Route::get('company-info', [CompanyProfileController::class, 'show_data'])->name('company.info.data');

    

// Route::group(['middleware'=>['sessionVerify']] , function(){
//     Route::group(['middleware'=>['userType']] , function(){

//         Route::get('/customer-dashboard', [CustomerController::class, 'customer_dashboard'])->name('customer.dashboard');

//     });
// });