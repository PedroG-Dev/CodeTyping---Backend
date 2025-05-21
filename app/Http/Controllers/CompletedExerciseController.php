<?php

namespace App\Http\Controllers;

use App\Models\CompletedExercise;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompletedExerciseController extends Controller
{
    /**
     * Display a listing of completed exercises for the authenticated user.
     */
    public function index(Request $request)
    {
        $query = CompletedExercise::where('user_id', Auth::id())
            ->with('exercise');

        if ($request->has('exercise_id')) {
            $query->where('exercise_id', $request->exercise_id);
        }

        $completedExercises = $query->orderBy('completed_at', 'desc')->get();

        return response()->json($completedExercises);
    }

    /**
     * Store a newly completed exercise.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'score' => 'required|integer|min:0|max:100'
        ]);

        // Check if exercise is already completed
        $existing = CompletedExercise::where('user_id', Auth::id())
            ->where('exercise_id', $validated['exercise_id'])
            ->first();

        if ($existing) {
            return response()->json([
                'message' => 'Exercise already completed. Use PUT /completed-exercises/{id} to update the score.',
                'completed_exercise' => $existing
            ], 422);
        }

        $completedExercise = CompletedExercise::create([
            'user_id' => Auth::id(),
            'exercise_id' => $validated['exercise_id'],
            'score' => $validated['score'],
            'completed_at' => now()
        ]);

        return response()->json($completedExercise, 201);
    }

    /**
     * Update the score of a completed exercise.
     */
    public function update(Request $request, CompletedExercise $completedExercise)
    {
        // Ensure the user can only update their own completed exercises
        if ($completedExercise->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'score' => 'required|integer|min:0|max:100'
        ]);

        // Only update if the new score is better
        if ($validated['score'] > $completedExercise->score) {
            $completedExercise->update([
                'score' => $validated['score'],
                'completed_at' => now()
            ]);

            return response()->json([
                'message' => 'Score updated successfully',
                'completed_exercise' => $completedExercise
            ]);
        }

        return response()->json([
            'message' => 'New score is not better than the current score',
            'current_score' => $completedExercise->score
        ], 422);
    }

    /**
     * Display the specified completed exercise.
     */
    public function show(CompletedExercise $completedExercise)
    {
        // Ensure the user can only view their own completed exercises
        if ($completedExercise->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($completedExercise->load('exercise'));
    }

    /**
     * Get statistics for the authenticated user.
     */
    public function statistics()
    {
        $stats = [
            'total_completed' => CompletedExercise::where('user_id', Auth::id())->count(),
            'average_score' => CompletedExercise::where('user_id', Auth::id())->avg('score'),
            'highest_score' => CompletedExercise::where('user_id', Auth::id())->max('score'),
            'recent_completions' => CompletedExercise::where('user_id', Auth::id())
                ->with('exercise')
                ->orderBy('completed_at', 'desc')
                ->take(5)
                ->get()
        ];

        return response()->json($stats);
    }
}
