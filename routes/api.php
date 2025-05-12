<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\LanguageLevelController;
use App\Http\Controllers\ExerciseController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [UserController::class, 'home']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Programming Languages Routes
    Route::apiResource('programming-languages', ProgrammingLanguageController::class);
    Route::apiResource('language-levels', LanguageLevelController::class);
    Route::apiResource('exercises', ExerciseController::class);
});
