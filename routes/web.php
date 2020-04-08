<?php

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

use App\Http\Controllers\ArticlesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
  return view('about');
});


Route::get('landing', 'Ready\ReadinessController@landing')->name('landing');


Route::get('manager', 'Ready\ReadinessController@manager')->name('manager');


Route::get('team', 'Admin\UsersController@team')->name('team');


Route::get('preReadiness', 'Ready\ReadinessController@preReadiness')->name('preReadiness');

Route::get('postWellness', 'Ready\ReadinessController@postWellness')->name('postWellness');


Route::get('tactics', 'Ready\ReadinessController@tactics')->name('tactics');


// Route::get('goalSetting', 'Ready\ReadinessController@goalSetting')->name('goalSetting');

// Route::get('articles', 'Ready\ReadinessController@articles')->name('articles');

Route::get('matchReports', 'Ready\ReadinessController@matchReports')->name('matchReports');


Route::get('appointment', 'Ready\ReadinessController@appointment')->name('appointment');


// Route::get('/goalSetting', function () {
//   return view('goalSetting');
// });




// Route::get('/appointment', function () {
//   return view('appointment');
// });
/*
Route::get('/articles', function () {
  return view('articles');
});

Route::get('/history', function () {
  return view('history');
});

Route::get('/matchReports', function () {
    return view('matchReports');
});
*/

Route::get('/history', 'Ready\ReadinessController@history')->name('history');

Route::get('/historyOfTeam', 'Ready\ReadinessController@historyOfTeam')->name('historyOfTeam');

Route::get('/playerGoals', 'Ready\ReadinessController@playerGoals')->name('playerGoals');

Route::get('/historyOfPlayer', 'Ready\ReadinessController@historyOfPlayer')->name('historyOfPlayer');


Route::get('admin', ['middleware' => 'isadmin', function () {
    return view('admin\users\landingpageforadmin');
}]);

Route::get('user', ['middleware' => 'auth', function () {
  return redirect()->route('landing');
}]);

// Route::get('manager', ['middleware' => 'auth', function () {
//   return redirect()->route('manager');
// }]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

  Route::resource('/users', 'UsersController');

});

Route::namespace('Ready')->prefix('ready')->name('ready.')->group(function(){

  Route::resource('/actions', 'ReadinessController');

});

Route::view('form', 'user');

Route::post('createReadiness', 'Ready\ReadinessController@createReadiness');

Route::post('createWellness', 'Ready\ReadinessController@createWellness');

// Creates a route to al resources in ArticlesController

Route::resource('articles', 'ArticlesController');

Route::resource('goals', 'GoalsController');

Route::resource('reports', 'ReportsController');

Route::resource('honkydoryreadiness', 'Ready\ReadinessController');

Route::resource('honkydoryusers', 'Admin\UsersController');

Auth::routes();


