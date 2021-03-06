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


Auth::routes();

//localization
Route::get('locale/{locale}','LocalizationController@index');

//welcome page
Route::view('/welcome', 'welcome');
Route::view('/', 'welcome');

//home page
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/calendar', 'EventController@showCalendar');

//calendar
Route::get('/calendar', 'EventController@showCalendar');

Route::middleware(['auth'])->group(function () {
  //User attach subjects
  Route::get('/users/{user}/classroom', 'UserController@storeUserClassRoom');
  Route::post('/users/{user}/subjects', 'UserController@storeUserClassSubjects');
  Route::view('users/profile', 'users.profile');

  //Admin User view
  Route::get('/users/view/{role}', 'UserViewController@userIndexView');

  //cangepassword
  Route::post('/users/changePassword', 'UserController@changePassword');
  Route::view('/changepassword', 'users.changePassword');
  Route::view('/users/profile', 'users.profile');

  //Admin Permissions View
  Route::get('/permissions/view/{permissibletype}', 'PermissionViewController@permissionIndexView');
  Route::post('/permissions/{permission}/addUser', 'PermissionViewController@addUser');

  //plug announcement
  Route::post('/societies/{society}/announcements','AnnouncementController@storeUnderSociety');
  Route::post('/sports/{sport}/announcements','AnnouncementController@storeUnderSport');

  //topics for subjects
  Route::post('/classSubjects/{classSubject}/topics','TopicController@store');
  Route::put('/classSubjects/topics/{topic}/update','TopicController@update');
  Route::get('/classSubjects/topics/updatesequence','TopicController@updateSequence');

  //plug downloads to subjectLessons
  Route::post('/classSubjects/{classSubject}/downloads','DownloadController@store');
  Route::put('/classSubjects/{classSubject}/downloads/{download}/edit','DownloadController@edit');
  Route::post('/classSubjects/{classSubject}/downloads/{download}/delete','DownloadController@destroy');
  Route::get('/classSubjects/{classSubject}/preview', 'ClassSubjectController@preview')->name('preview');
  Route::view('/studentView', 'classSubjects.studentView');

  //plug comments to forums
  Route::post('/forums/{forum}/comments','CommentController@store');
  Route::put('/forums/{forum}/comments/{comment}/edit','CommentController@edit');
  Route::post('/forums/{forum}/comments/{comment}/delete','CommentController@destroy');

  //plug comments to essayAnswers
  Route::post('/essays/essayAnswers','EssayAnswerController@store');
  Route::post('/essays/{essay}/essayAnswers/{essayAnswer}/show','EssayAnswerController@show');

  //plug downloads to subjectLessons
  Route::post('/classSubjects/{classSubject}/downloads','DownloadController@store');
  Route::put('/classSubjects/{classSubject}/downloads/{download}/edit','DownloadController@edit');
  Route::post('/classSubjects/{classSubject}/downloads/{download}/delete','DownloadController@destroy');

  //filters
  Route::get('/classSubjects/filteredindex','ClassSubjectController@filteredIndex');
  Route::get('/societies/filteredindex','SocietyController@filteredIndex');
  Route::get('/sports/filteredindex','SportController@filteredIndex');

  //resources
  Route::resource('users', 'UserController');
  Route::resource('roles', 'RoleController');
  Route::resource('permissions', 'PermissionController');
  Route::resource('announcements', 'AnnouncementController');
  Route::resource('subjects', 'SubjectController');
  Route::resource('societies', 'SocietyController');
  Route::resource('grades', 'GradeController');
  Route::resource('classRooms', 'ClassRoomController');
  Route::resource('forums', 'ForumController');
  Route::resource('classSubjects', 'ClassSubjectController');
  Route::resource('sports', 'SportController');
  Route::resource('events', 'EventController');
  Route::resource('studentSubjects', 'StudentSubjectController');
  Route::resource('tasks', 'TaskController');
  Route::resource('quizzQuestions', 'QuizzQuestionController');
  Route::resource('quizzQuestionOptions', 'QuizzQuestionOptionController');
  Route::resource('quizzTopics', 'QuizzTopicController');
  Route::resource('quizzes', 'QuizController');
  Route::resource('downloads', 'DownloadController');
});
