<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;

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

    Route::get('/login', [LoginController::class, 'login_index'])->name('login');
    Route::post('/post-login', [LoginController::class, 'postLogin'])->name('login.post'); 

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


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

    
    
    

    

    

Route::group(['middleware'=>['sessionVerify']] , function(){
    Route::group(['middleware'=>['userType']] , function(){

        //===========================admin panel route========================
        Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('invoice', [AdminController::class, 'admin_invoice'])->name('admin.invoice');
        Route::get('data-show', [AdminController::class, 'admin_show_table'])->name('admin.data.show');

        Route::get('service-index', [ServiceController::class, 'service_index'])->name('admin.service.index');
        Route::get('service-list', [ServiceController::class, 'service_all_data_show'])->name('admin.service.list');
        Route::post('add-service', [ServiceController::class, 'add_service_post'])->name('admin.add.service.post');
        Route::post('edit-service',[ServiceController::class, 'edit_service_details'])->name('edit.service.details');
        Route::post('update-service',[ServiceController::class, 'update_service_details'])->name('update.service.details');
        Route::post('delete-service',[ServiceController::class, 'delete_service'])->name('delete.service');

        Route::get('product-index', [ProductController::class, 'product_index'])->name('admin.product.index');
        Route::get('product-list', [ProductController::class, 'product_all_data_show'])->name('admin.product.list');
        Route::post('add-product', [ProductController::class, 'add_product_post'])->name('admin.add.product.post');
        Route::post('edit-product',[ProductController::class, 'edit_product_details'])->name('edit.product.details');
        Route::post('update-product',[ProductController::class, 'update_product_details'])->name('update.product.details');
        Route::post('delete-product',[ProductController::class, 'delete_product'])->name('delete.product');
        
        
        Route::get('company-info', [CompanyProfileController::class, 'show_data'])->name('company.info.data');
    });
});