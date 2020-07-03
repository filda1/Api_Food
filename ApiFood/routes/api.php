<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//   http://localhost:8000/api/category
Route::resource('/category','CategoryController');


// OJO :  2 middlewares para JWT:  jwt.verify y jwt.auth


//Admin Auth
Route::post('adminlogin', 'Auth\AdminLoginController@login');
Route::post('adminregister', '\Auth\AdminRegisterController@register');


//Here is the protected Admin Routes Group
Route::group(['middleware' => ['jwt.verify']], function(){
   Route::get('admin/dashboard', 'DashboardController@index');
});



//User 
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

// Protected
Route::group(['middleware' => 'jwt.auth', 'prefix' => 'user'], function(){
    Route::get('home', 'HomeController@index');
});


/*Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');
    Route::get('open', 'DataController@open');*/


 //admin   
 //Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
 //Route::post('adminlogin', 'Auth\AdminLoginController@login');
      

// Dentro van todas las rutas protegidas
/*Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'UserController@getAuthenticatedUser');     // protegida y autenticada(TOKEN)
        Route::get('closed', 'DataController@closed'); // protegida y autenticada(TOKEN)
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard'); // protegida y autenticada(TOKEN)
    });*/


