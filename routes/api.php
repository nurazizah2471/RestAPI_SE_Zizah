<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CourseBookingController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');
Route::apiResource('skill', SkillController::class)->middleware('auth:api');
Route::apiResource('course', CourseController::class)->middleware('auth:api');
Route::apiResource('course-booking', CourseBookingController::class)->middleware('auth:api');
Route::get('course_booking_cancel/{id}', [CourseBookingController::class, 'cancel'])->middleware('auth:api');
Route::get('course_booking_approve/{id}', [CourseBookingController::class, 'approve'])->middleware('auth:api');
Route::get('course_booking_complete/{id}', [CourseBookingController::class, 'complete'])->middleware('auth:api');
Route::apiResource('user', UserController::class)->middleware('auth:api');

Route::get('course_from_skill/{id}', [CourseController::class, 'getCourseFromSkill'])->middleware('auth:api');
