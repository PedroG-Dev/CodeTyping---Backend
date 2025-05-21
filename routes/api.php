<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammingLanguageController;
use App\Http\Controllers\LanguageLevelController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\CompletedExerciseController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AchievementUserController;

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

    // Completed Exercises Routes
    Route::get('/completed-exercises/statistics', [CompletedExerciseController::class, 'statistics']);
    Route::apiResource('completed-exercises', CompletedExerciseController::class)->only(['index', 'store', 'show', 'update']);

    // Achievements Routes
    Route::get('/my-achievements', [AchievementController::class, 'userAchievements']);
    Route::get('/my-progress', [AchievementController::class, 'userProgress']);
    Route::apiResource('achievements', AchievementController::class);
    Route::apiResource('achievement-users', AchievementUserController::class);
});
