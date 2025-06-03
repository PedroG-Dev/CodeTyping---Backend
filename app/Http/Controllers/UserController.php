<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function home(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'message' => 'Welcome to your home page'
        ]);
    }

    /**
     * Get the top 10 users by total score
     */
    public function topUsers()
    {
        $topUsers = User::withSum('completedExercises', 'score')
            ->orderByDesc('completed_exercises_sum_score')
            ->take(10)
            ->get(['id', 'name', 'email']);

        return response()->json($topUsers);
    }
}