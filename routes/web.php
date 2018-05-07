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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Website\HomeController@getHome');
Route::get('test', 'Dashboard\MemberDashboardController@index');

Route::group(['prefix' => 'auth'], function () {
    Route::get('register', 'Auth\RegisterController@getRegistration');
    Route::post('create-user', 'Auth\RegisterController@postRegistration');
    Route::get('login', 'Auth\LoginController@getLogin');
    Route::post('login-user', 'Auth\LoginController@postLogin');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::get('member', 'Dashboard\MemberDashboardController@index')->middleware('valid');
Route::group(['prefix' => 'member','middleware'=>'valid'], function () {
    //add all member routes here
});

//Route::group(['prefix' => 'admin/', 'middleware'=>'valid'], function () {
Route::group(['prefix' => 'admin/'], function () {
    Route::get('home', 'Dashboard\AdminDashboardController@index');
    
    // Question Section
    Route::get('view/questions', 'Question\QuestionController@getQuestions');
    Route::get('add/questions', 'Question\QuestionController@getQuestionForm');
    Route::post('add/post-question', 'Question\QuestionController@postQuestionForm');
    Route::get('edit/question/{id}', 'Question\QuestionController@getEditQuestion');
    Route::post('edit/post-question', 'Question\QuestionController@postEditQuestion');
    
    // Users Section
    Route::get('view/users', 'User\UsersController@getUsers');
    
    // Category Section
    Route::get('view/category', 'Category\CategoryController@getCategories');
    Route::get('add/category', 'Category\CategoryController@getCategoryForm');
});


// OAuth Routes
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
