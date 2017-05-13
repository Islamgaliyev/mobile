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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('report','IndexController@message')->name('report');
Route::get('/','IndexController@index');
Route::get('new_situations','IndexController@show');
Route::post('/fixSituation/{id}','IndexController@fixSituation')->name('fixSituation');
Route::get('/show_fix_situation/{id}','IndexController@fixShow')->name('fixShow');
Route::get('/info/{id}','IndexController@info')->name('infoShow');
Route::post('report','IndexController@Image_Upload')->name('Image_Upload');
Route::get('/list_of_fixed_situations','IndexController@listFixSit');
Route::get('/list_of_fixed_situations/{id}','IndexController@fixed_sit')->name('fixed_sit');
Route::get('auth/login', 'IndexController@getLogin');
Route::post('auth/login', 'IndexController@postLogin');
Route::get('logout', 'IndexController@logout');

// Route::group(['prefix'=>'/report','middleware'=>'auth'],function(){
// 	Route::get('report','IndexController@message');
 	//Route::post('report','IndexController@Image_Upload')->name('Image_Upload');
//});	

