<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => 'admin'], function () {

        Route::post('/view-map', [AdminController::class, 'viewMap']);

		Route::group(['prefix' => 'create'], function () {
            Route::post('/elementary-subject', [AdminController::class, 'createElementarySubject']);
            Route::post('/high-school-subject', [AdminController::class, 'createHighSchoolSubject']);
            Route::post('/tle-tve-subject', [AdminController::class, 'createTLETVESubject']);
            Route::post('/senior-high-school-subject', [AdminController::class, 'createSeniorHighSchoolSubject']);
            Route::post('/strand-subject', [AdminController::class, 'createStrandSubject']);
            Route::post('/school', [AdminController::class, 'createSchool']);
            Route::post('/school-year', [AdminController::class, 'createSchoolYear']);
            Route::post('/request-documents', [AdminController::class, 'createRequestDocuments']);
            Route::post('/face-auth', [AdminController::class, 'createFaceAuth']);
        });
		Route::group(['prefix' => 'update'], function () {
            Route::patch('/elementary-subject', [AdminController::class, 'updateElementarySubject']);
            Route::patch('/high-school-subject', [AdminController::class, 'updateHighSchoolSubject']);
            Route::patch('/tle-tve-subject', [AdminController::class, 'updateTLETVESubject']);
            Route::patch('/senior-high-school-subject', [AdminController::class, 'updateSeniorHighSchoolSubject']);
            Route::patch('/strand-subject', [AdminController::class, 'updateStrandSubject']);
            Route::patch('/school', [AdminController::class, 'updateSchool']);
            Route::patch('/request-documents', [AdminController::class, 'updateRequestDocuments']);
            Route::patch('/admin-account', [AdminController::class, 'updateAdminAccount']);
        });
		Route::group(['prefix' => 'delete'], function () {
            Route::delete('/elementary-subject', [AdminController::class, 'deleteElementarySubject']);
            Route::delete('/high-school-subject', [AdminController::class, 'deleteHighSchoolSubject']);
            Route::delete('/tle-tve-subject', [AdminController::class, 'deleteTLETVESubject']);
            Route::delete('/senior-high-school-subject', [AdminController::class, 'deleteSeniorHighSchoolSubject']);
            Route::delete('/strand-subject', [AdminController::class, 'deleteStrandSubject']);
            Route::delete('/school', [AdminController::class, 'deleteSchool']);
            Route::delete('/request-documents', [AdminController::class, 'deleteRequestDocuments']);
        });

	});

    Route::group(['middleware' => 'school'], function () {

		Route::group(['prefix' => 'create'], function () {
            Route::post('/teacher', [SchoolController::class, 'createTeacher']);
            Route::post('/promeds', [SchoolController::class, 'createProMeds']);
		});
		Route::group(['prefix' => 'update'], function () {
            Route::patch('/elementary-subject-mps', [SchoolController::class, 'updateElementarySubjectMPS']);
            Route::patch('/high-school-subject-mps', [SchoolController::class, 'updateHighSchoolSubjectMPS']);
            Route::patch('/senior-high-school-subject-mps', [SchoolController::class, 'updateSeniorHighSchoolSubjectMPS']);
            Route::patch('/elem-total-students', [SchoolController::class, 'updateElemTotalStudents']);
            Route::patch('/hs-total-students', [SchoolController::class, 'updateHSTotalStudents']);
            Route::patch('/shs-total-students', [SchoolController::class, 'updateSHSTotalStudents']);
            Route::patch('/teacher', [SchoolController::class, 'updateTeacher']);
            Route::patch('/school-account', [SchoolController::class, 'updateSchoolAccount']);
            Route::patch('/promeds', [SchoolController::class, 'updateProMeds']);
        });
		Route::group(['prefix' => 'delete'], function () {
            Route::delete('/teacher', [SchoolController::class, 'deleteTeacher']);
            Route::delete('/promeds', [SchoolController::class, 'deleteProMeds']);
		});
        
	});

    Route::group(['middleware' => 'teacher'], function () {

		Route::group(['prefix' => 'create'], function () {
            Route::post('/upload-attacments', [TeacherController::class, 'createUploadAttachments']);
		});
		Route::group(['prefix' => 'update'], function () {
            Route::patch('/teacher-account', [TeacherController::class, 'updateTeacherAccount']);
        });
		Route::group(['prefix' => 'delete'], function () {
            Route::delete('/attachments', [TeacherController::class, 'deleteAttachments']);
		});
        
	});
});
