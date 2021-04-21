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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/photo', function () {
    return view('webcam.clickphoto');
});


Route::get('/home', 'HomeController@index')->name('home');



Route::get('/admin/quiz/create', function () {
    return view('admin.quiz.create');
})->name('create_quiz_view');

Route::post('/admin/quiz/create', 'QuizController@store')->name('create_quiz');

Route::get('/admin/quiz/create/question', 'QuestionController@index')->name('create_quiz_question');
Route::post('/admin/quiz/create/question', 'QuestionController@store')->name('add_question_quiz');
Route::get('/admin/quiz', 'QuizController@getAllQuizzes')->name('view_all_quizzes');
Route::get('/admin/student', 'StudentController@getAllStudents')->name('view_all_students');
Route::get('/admin/assignquiz', 'QuizController@assignQuizIndex')->name('assign_quiz_to_student');
Route::post('/admin/assignquiz', 'QuizController@assignQuizToStudent')->name('assign_quiz');
Route::post('/admin/quiz/results/generate', 'ResultController@generateResults')->name('quiz_results');
Route::get('/admin/quiz/results', 'ResultController@index')->name('quiz_results_index');
Route::get('/admin/quiz/logs', 'LogController@index')->name('quiz_logs_index');
Route::post('/admin/quiz/logs', 'LogController@showQuizLogs')->name('quiz_logs');
Route::get('/admin/quiz/{quizID}/student/{studentID}/logs', 'LogController@showStudentLogs')->name('student_quiz_logs');

Route::post('/student/quiz', 'QuizController@index')->name('quiz');
Route::post('/student/quiz/submit', 'QuizController@submitQuiz')->name('submit_quiz');
Route::post('student/quiz/photo/store', 'StudentController@storeStudentImage')->name('store_student_quiz_image');
Route::post('student/quiz/disqualify', 'QuizController@disqualifyStudent')->name('disqualify_student');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/student', 'StudentController@index')->name('student')->middleware('student');

Route::get('storage/{filename}', 'StudentController@getImage')->name('get_image');
