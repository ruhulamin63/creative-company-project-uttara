<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\HomeController;

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

        //==================================Service route=======================================
        Route::get('service-index', [ServiceController::class, 'service_index'])->name('admin.service.index');
        Route::get('service-list', [ServiceController::class, 'service_all_data_show'])->name('admin.service.list');
        Route::post('add-service', [ServiceController::class, 'add_service_post'])->name('admin.add.service.post');
        Route::post('edit-service',[ServiceController::class, 'edit_service_details'])->name('edit.service.details');
        Route::post('update-service',[ServiceController::class, 'update_service_details'])->name('update.service.details');
        Route::post('delete-service',[ServiceController::class, 'delete_service'])->name('delete.service');

        //====================================Product route===============================
        Route::get('product-index', [ProductController::class, 'product_index'])->name('admin.product.index');
        Route::get('product-list', [ProductController::class, 'product_all_data_show'])->name('admin.product.list');
        Route::post('add-product', [ProductController::class, 'add_product_post'])->name('admin.add.product.post');
        Route::post('edit-product',[ProductController::class, 'edit_product_details'])->name('edit.product.details');
        Route::post('update-product',[ProductController::class, 'update_product_details'])->name('update.product.details');
        Route::post('delete-product',[ProductController::class, 'delete_product'])->name('delete.product');
        
        //==============================job context route=============================
        Route::get('career-index', [CareerController::class, 'career_index'])->name('admin.career.index');
        Route::get('career-list', [CareerController::class, 'career_all_data_show'])->name('admin.career.list');
        Route::post('add-career', [CareerController::class, 'add_career_post'])->name('admin.add.career.post');
        Route::post('edit-career',[CareerController::class, 'edit_career_details'])->name('edit.career.details');
        Route::post('update-career',[CareerController::class, 'update_career_details'])->name('update.career.details');
        Route::post('delete-career',[CareerController::class, 'delete_career'])->name('delete.career');

        //================================Company Profile Route=============================
        Route::get('company-index', [CompanyProfileController::class, 'company_index'])->name('admin.company.index');
        Route::get('company-list', [CompanyProfileController::class, 'company_all_data_show'])->name('admin.company.list');
        Route::post('add-company', [CompanyProfileController::class, 'add_company_post'])->name('admin.add.company.post');
        Route::post('edit-company',[CompanyProfileController::class, 'edit_company_details'])->name('edit.company.details');
        Route::post('update-company',[CompanyProfileController::class, 'update_company_details'])->name('update.company.details');
        Route::post('delete-comapany',[CompanyProfileController::class, 'delete_company'])->name('delete.company');
    
        //================================Client Route=============================
        Route::get('client-index', [ClientController::class, 'client_index'])->name('admin.client.index');
        Route::get('client-list', [ClientController::class, 'client_all_data_show'])->name('admin.client.list');
        Route::post('add-client', [ClientController::class, 'add_client_post'])->name('admin.add.client.post');
        // Route::post('edit-client',[ClientController::class, 'edit_client_details'])->name('edit.client.details');
        // Route::post('update-client',[ClientController::class, 'update_client_details'])->name('update.client.details');
        Route::post('delete-client',[ClientController::class, 'delete_client'])->name('delete.client');

        //================================Partner Route=============================
        Route::get('partner-index', [PartnerController::class, 'partner_index'])->name('admin.partner.index');
        Route::get('partner-list', [PartnerController::class, 'partner_all_data_show'])->name('admin.partner.list');
        Route::post('add-partner', [PartnerController::class, 'add_partner_post'])->name('admin.add.partner.post');
        // Route::post('edit-client',[PartnerController::class, 'edit_client_details'])->name('edit.client.details');
        // Route::post('update-client',[PartnerController::class, 'update_client_details'])->name('update.client.details');
        Route::post('delete-partner',[PartnerController::class, 'delete_partner'])->name('delete.partner');


        //================================About Route=============================
        Route::get('about-index', [AboutController::class, 'about_index'])->name('admin.about.index');
        Route::get('about-list', [AboutController::class, 'about_all_data_show'])->name('admin.about.list');
        Route::post('add-about', [AboutController::class, 'add_about_post'])->name('admin.add.about.post');
        Route::post('edit-about',[AboutController::class, 'edit_about_details'])->name('edit.about.details');
        Route::post('update-about',[AboutController::class, 'update_about_details'])->name('update.about.details');
        Route::post('delete-about',[AboutController::class, 'delete_about'])->name('delete.about');
        

        //================================Portfolio Route=============================
        Route::get('portfolio-index', [PortfolioController::class, 'portfolio_index'])->name('admin.portfolio.index');
        Route::get('portfolio-list', [PortfolioController::class, 'portfolio_all_data_show'])->name('admin.portfolio.list');
        Route::post('add-portfolio', [PortfolioController::class, 'add_portfolio_post'])->name('admin.add.portfolio.post');
        // Route::post('edit-portfolio',[PortfolioController::class, 'edit_portfolio_details'])->name('edit.portfolio.details');
        // Route::post('update-portfolio',[PortfolioController::class, 'update_portfolio_details'])->name('update.portfolio.details');
        Route::post('delete-portfolio',[PortfolioController::class, 'delete_portfolio'])->name('delete.portfolio');


         //================================Home Page Route=============================
         Route::get('home-index', [HomeController::class, 'home_index'])->name('admin.home.index');
         Route::get('home-list', [HomeController::class, 'home_all_data_show'])->name('admin.home.list');
         Route::post('add-home', [HomeController::class, 'add_home_post'])->name('admin.add.home.post');
         Route::post('edit-home',[HomeController::class, 'edit_home_details'])->name('edit.home.details');
         Route::post('update-home',[HomeController::class, 'update_home_details'])->name('update.home.details');
         Route::post('delete-home',[HomeController::class, 'delete_home'])->name('delete.home');


        //==============================Profile=============================
        //profile
        Route::get('admin/setting', [ProfileController::class, 'admin_settings'])->name('admin.setting');
        Route::get('admin/overview', [ProfileController::class, 'admin_overview'])->name('admin.overview');

        Route::post('admin/setting/change_info', [ProfileController::class, 'change_info'])->name('admin.change.info');
        Route::post('admin/setting/change_email', [ProfileController::class, 'change_email'])->name('admin.change.email');
        Route::post('admin/setting/change_password', [ProfileController::class, 'change_password'])->name('admin.change.password');
    
    });
});