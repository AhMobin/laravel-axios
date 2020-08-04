<?php

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

Route::group(['middleware'=>'loginCheck'], function (){
    //dashboard
    Route::get('/', 'Backend\PageController@index')->name('dashboard');


//visitors section
    Route::get('visitors','Backend\VisitorsController@visitors')->name('visitors');
    Route::get('visitors-data','Backend\VisitorsController@getVisitorData');

//service section
    Route::get('services','Backend\ServiceController@services')->name('service');
    Route::get('services-data','Backend\ServiceController@getServiceData');
    Route::post('service-added','Backend\ServiceController@addNewService');
    Route::post('service-details','Backend\ServiceController@ServiceDetails');
    Route::post('service-update','Backend\ServiceController@ServiceUpdate');
    Route::post('service-delete','Backend\ServiceController@ServiceDelete');


//course section
    Route::get('courses','Backend\CourseController@courses')->name('course');
    Route::get('course-data','Backend\CourseController@getCourseData');
    Route::post('course-details','Backend\CourseController@courseDetails');
    Route::post('course-update','Backend\CourseController@courseUpdate');
    Route::post('course-delete','Backend\CourseController@courseDelete');
    Route::post('course-added','Backend\CourseController@courseInsert');


//course section
    Route::get('projects','Backend\ProjectController@projects')->name('project');
    Route::get('project-data','Backend\ProjectController@getProjectData');
    Route::post('project-added','Backend\ProjectController@addProject');
    Route::post('project-removed','Backend\ProjectController@removeProject');
    Route::post('project-details','Backend\ProjectController@detailsProject');
    Route::post('project-updated','Backend\ProjectController@updateProject');


    //photo gallery
    Route::get('gallery','Backend\GalleryController@gallery')->name('gallery');
    Route::get('photos','Backend\GalleryController@photoGalleries');
    Route::post('photo-upload','Backend\GalleryController@photoUpload');

});



//Admin Login
Route::get('login','Backend\LoginController@login');
Route::post('login','Backend\LoginController@loginSubmit');
Route::get('logout','Backend\LoginController@logout');
