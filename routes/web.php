<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()
{
    return view('auth.login');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// show the billing informations
Route::get('/bill', 'BillController@index');

// controllers for orders
Route::resource('order',"OrderController");
Route::get('/order_home', 'OrderController@index');
//Route::get('/add_order', 'OrderController@add_order');
Route::post('/add_order', 'OrderController@store');

// controllers for share orders
Route::get('/order/share/{order_id}', 'ShareOrderController@index');
Route::post('/order/share/{order_id}', 'ShareOrderController@store');

// controllers for offers
Route::resource('offer','OfferController');
Route::get('/offer_home', 'OferController@index');
Route::get('offer/create', 'OrderController@create');


/* controllers for make_bid*/
Route::resource('/make_bid',"Make_bidController");

/* controllers for  profile*/
Route::resource('my_profile',"ProfileController");
Route::post('my_profile',"ProfileController@store");

//******************************* Admin *************************************************************************

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function ()
{
    Route::get('/', 'UsersController@index');

    // Countries
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::resource('cities', 'CitiesController');

    //Items
    Route::resource('items', 'ItemsController');

    //Jobs
    Route::resource('jobs', 'JobsController');

    // ItemCategoreis
    Route::resource('itemCategories', 'ItemCategoriesController');

    // Health
    Route::resource('health', 'HealthController');

    // Companies
    Route::resource('companies', 'CompaniesController');


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Expensecategories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Incomecategories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expensereports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');
});



