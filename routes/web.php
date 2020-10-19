<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole;

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
        // return view('auth.login');
        return view('welcome');
        // return "home";
    });

    Route::get('author', function () {
        return response()->json([
            'name' => 'Adhimas Pns',
            'github' => 'https://github.com/adhimaspns'
        ]);
    });
    
    // Route::get('/form/login', 'AuthController@formlogin')->name('formlogin')->middleware('guest');
    Route::get('/form/login', 'AuthController@formlogin')->name('formlogin');
    Route::post('/proses-login', 'AuthController@postlog');
    Route::post('/signout', 'AuthController@signout');
    
    // Route Group level superadmin
    Route::group(['middleware' => ['auth','checkRole:superadmin'] ], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('admin', 'Web\AdminController@index');
        Route::get('admin/detail/{iduser}', 'Web\AdminController@detail');
        Route::get('admin/create', 'Web\AdminController@create');
        Route::post('admin', 'Web\AdminController@store');
        Route::delete('admin/{iduser}', 'Web\AdminController@destroy')->name('admin.destroy');
        Route::get('event', 'Web\EventController@index');
        Route::get('showcase', 'Web\ShowcaseController@index');
        Route::get('mentor', 'Web\MentorController@index');
        Route::get('mentor/detail/{id}', 'Web\MentorController@show');
        Route::get('mentor/create', 'Web\MentorController@create');
    });

    // if ($user == 'auth' && ($role == 'admin' || $role == 'superadmin')) {
    //     # code...
    // }

    // Route Group level admin
    Route::group(['middleware' => ['auth', 'checkRole:admin,superadmin'] ], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('event', 'Web\EventController@index');
        Route::get('showcase', 'Web\ShowcaseController@index');
        Route::get('mentor', 'Web\MentorController@index');
        Route::get('mentor/detail/{id}', 'Web\MentorController@show');
    });










    

// Route::get('log', 'AuthController@login');
// Route::post('postlog', 'AuthController@postlog');

// Route::get('base', function () {
//     return view('template.base');
// });

// Route::get('dashboard', function() {
//     return view('admin.dashboard');
// });
// Route::get('user', function() {
//     return view('admin.master.user.index');
// });


Auth::routes(

    //? Untuk menonaktifkan Register  
    // ['register' => false]
);



