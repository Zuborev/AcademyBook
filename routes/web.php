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
Route::post('ajaxGroupSubjects', 'Ajax\LessonsAjaxController@groupSubjects');
Route::post('ajaxTeachersSubjects', 'Ajax\LessonsAjaxController@teachersSubjects');
Route::get('admin/ajaxSliderIndex', 'Ajax\SliderAjaxController@index');
Route::get('admin/ajaxSliderProfile', 'Ajax\SliderAjaxController@profile');


Route::get('/', 'SiteController@index')->name('index');
Route::get('/timetable', 'SiteController@timetable')->name('Timetable');;
Route::get('/timetable/{name}/{id}', 'SiteController@showTimetable')->name('showTimetable');
Route::get('/news/{slug}', 'SiteController@news')->name('news');
Route::get('/rank', 'SiteController@rank');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' =>'admin/users',],function ()
{
    Route::resource('types', 'AdminTypeUserController')->names('admin.types');
});

Route::group(['namespace' => 'Admin', 'prefix' =>'admin'],function ()
{
    Route::get('/','IndexController@index');
    Route::resource('groups', 'adminGroupsController')->except("show")->names('admin.groups');
    Route::resource('subjects', 'AdminSubjectController')->names('admin.subjects');
    Route::resource('users', 'AdminUserController')->names('admin.users');
    Route::resource('rooms', 'AdminRoomController')->names('admin.rooms');
    Route::resource('courses', 'AdminCourseController')->names('admin.courses');
    Route::resource('Lessons', 'AdminLessonsController')->except("show")->names('admin.lessons');
    Route::resource('News', 'AdminNewsController')->except("show")->names('admin.news');
    Route::resource('Slider', 'AdminSliderController')->names('admin.slider');
});

//Journal
Route::get('/journals', 'JournalController@showJournal')->name('showJournal');
Route::post('/journals/next-week', 'JournalController@showNextWeek')->name('showNextWeek');

//CurrentLesson
Route::get('/current-lesson', 'CurrentLessonController@showCurrentLesson')->name('showCurrentLesson');
Route::post('/current-lesson/save-data', 'CurrentLessonController@saveCurrentLesson')->name('saveCurrentLesson');
Route::get('/current-lesson/{lesson_id}/edit', 'CurrentLessonController@editCurrentLesson')->name('editCurrentLesson');
Route::put('/current-lesson/update', 'CurrentLessonController@updateCurrentLesson')->name('updateCurrentLesson');


