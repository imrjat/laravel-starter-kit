<?php

use App\Http\Controllers\API\Company\Auth\LoginController as CompanyAuthLoginController;
use App\Http\Controllers\API\Company\Auth\RegisterController as CompanyAuthRegisterController;
use App\Http\Controllers\API\Company\Auth\SocialLoginController;
use App\Http\Controllers\API\Employee\Auth\ForgotPasswordController as EmployeeAuthForgotPasswordController;
use App\Http\Controllers\API\Employee\Auth\LoginController as EmployeeAuthLoginController;
use App\Http\Controllers\API\Employee\Auth\RegisterController as EmployeeAuthRegisterController;
use App\Http\Controllers\API\Employee\Auth\VerificationController;

Route::post('employee/register', [EmployeeAuthRegisterController::class, 'register']);
Route::post('employee/login', [EmployeeAuthLoginController::class, 'login']);
Route::post('employee/forgot-password', [EmployeeAuthForgotPasswordController::class, 'sendResetLink']);
Route::post('employee/reset-password', [EmployeeAuthForgotPasswordController::class, 'reset_password']);

Route::post('company/register', [CompanyAuthRegisterController::class, 'register']);
Route::post('company/login', [CompanyAuthLoginController::class, 'login']);

Route::get('company/login/{github}', [SocialLoginController::class, 'redirectToProvider']);
Route::get('company/{github}/callback', [SocialLoginController::class, 'handleProviderCallback']);

Route::get('employee/email/verify/{id}', [VerificationController::class, 'verify'])->name('employee.email.verification.verify');
// Route::get('employee/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
