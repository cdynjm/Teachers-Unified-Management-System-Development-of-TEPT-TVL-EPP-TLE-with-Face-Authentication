<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\SchoolController; 
use App\Http\Controllers\TeacherController; 
use Illuminate\Support\Facades\Storage;

Route::get('/storage', function () {
    Artisan::call('storage:link');
});


Route::group(['middleware' => 'guest'], function () {
	Route::get('/', [LoginController::class, 'show'])->name('login');
	Route::get('/login', [LoginController::class, 'show'])->name('login');
	Route::get('/admin/login', [LoginController::class, 'adminShow'])->name('admin-login');
	Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
	Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.perform');
	Route::post('/face-login', [LoginController::class, 'faceLogin']);

});

Route::group(['middleware' => 'auth'], function () {

	Route::group(['middleware' => 'admin'], function () {

		Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
		Route::get('/admin-profile/{id}', [AdminController::class, 'profile'])->name('admin-profile');
		Route::get('/subjects', [AdminController::class, 'subjects'])->name('subjects');
		Route::get('/schools', [AdminController::class, 'schools'])->name('schools');
		Route::get('/elementary-schools/{id}', [AdminController::class, 'elementarySchools'])->name('elementary-schools');
		Route::get('/high-schools/{id}', [AdminController::class, 'highSchools'])->name('high-schools');
		Route::get('/map', [AdminController::class, 'map'])->name('map');
		Route::get('/edit-school/{school}/{id}', [AdminController::class, 'editSchool'])->name('edit-school');
		Route::get('/documents', [AdminController::class, 'documents'])->name('documents');
		Route::get('/view-documents/{id}', [AdminController::class, 'viewDocuments'])->name('view-documents');
		Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers');
		Route::get('/school-documents/{school}/{type}', [AdminController::class, 'schoolDocuments'])->name('school-documents');
		Route::get('/school-view-documents/{id}/{school}/{type}', [AdminController::class, 'viewSchoolDocuments'])->name('school-view-documents');

		Route::post('/search/elementary-school', [AdminController::class, 'searchElementarySchool']);
		Route::post('/search/high-school', [AdminController::class, 'searchHighSchool']);
		Route::post('/search/elementary-school-teachers', [AdminController::class, 'searchElementarySchoolTeachers']);
		Route::post('/search/high-school-teachers', [AdminController::class, 'searchHighSchoolTeachers']);
	
		Route::get('/admin-pro-meds/{id}/{type}/{type2}/{schoolType}', [AdminController::class, 'proMeds'])->name('admin.promeds');
	});

	Route::group(['middleware' => 'school'], function () {
		Route::get('/school-dashboard', [SchoolController::class, 'dashboard'])->name('school-dashboard');
		Route::get('/school-profile/{id}', [SchoolController::class, 'profile'])->name('school-profile');
		Route::post('/user/search/elementary-school', [SchoolController::class, 'searchElementarySchool']);
		Route::post('/user/search/high-school', [SchoolController::class, 'searchHighSchool']);
		Route::get('/school-teachers', [SchoolController::class, 'teachers'])->name('school-teachers');
		Route::get('/pro-meds/{id}/{type}/{type2}', [SchoolController::class, 'proMeds'])->name('pro-meds');
	});

	Route::post('/download-promeds', [SchoolController::class, 'downloadProMeds'])->name('print.pro-meds');

	Route::group(['middleware' => 'teacher'], function () {
		Route::get('/teacher-dashboard', [TeacherController::class, 'dashboard'])->name('teacher-dashboard');
		Route::get('/teacher-profile/{id}', [TeacherController::class, 'profile'])->name('teacher-profile');
		Route::get('/view-requested-document/{id}', [TeacherController::class, 'viewRequestedDocument'])->name('view-requested-document');
	});

	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
});


