<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Services\AchievementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    protected $achievementService;

    public function __construct(AchievementService $achievementService)
    {
        $this->achievementService = $achievementService;
    }

    /**
     * Display a listing of all achievements.
     */
    public function index()
    {
        $achievements = Achievement::all();
        return response()->json($achievements);
    }

    /**
     * Get all achievements for the authenticated user, with unlock status.
     */
    public function userAchievements()
    {
        $user = Auth::user();
        $unlockedIds = $user->achievements->pluck('id')->toArray();

        $achievements = Achievement::all()->map(function ($achievement) use ($unlockedIds, $user) {
            $unlocked = in_array($achievement->id, $unlockedIds);
            $unlockedData = null;

            if ($unlocked) {
                $pivotData = $user->achievements()->where('achievement_id', $achievement->id)->first()->pivot;
                $unlockedData = [
                    'unlocked_at' => $pivotData->unlocked_at
                ];
            }

            return [
                'id' => $achievement->id,
                'name' => $achievement->name,
                'description' => $achievement->description,
                'type' => $achievement->type,
                'threshold' => $achievement->threshold,
                'icon' => $achievement->icon,
                'unlocked' => $unlocked,
                'unlock_data' => $unlockedData
            ];
        });

        return response()->json($achievements);
    }

    /**
     * Get achievement progress for the authenticated user.
     */
    public function userProgress()
    {
        $user = Auth::user();
        $completedCount = $user->completedExercises()->count();
        $totalPoints = $user->completedExercises()->sum('score');

        return response()->json([
            'exercises_completed' => $completedCount,
            'total_points' => $totalPoints,
            'achievements_unlocked' => $user->achievements()->count()
        ]);
    }

    /**
     * Store a newly created achievement.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:exercises,points',
            'threshold' => 'required|integer|min:1',
            'icon' => 'nullable|string|max:255'
        ]);

        $achievement = Achievement::create($validated);

        return response()->json($achievement, 201);
    }

    /**
     * Display the specified achievement.
     */
    public function show(Achievement $achievement)
    {
        return response()->json($achievement);
    }

    /**
     * Update the specified achievement.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'type' => 'sometimes|required|in:exercises,points',
            'threshold' => 'sometimes|required|integer|min:1',
            'icon' => 'nullable|string|max:255'
        ]);

        $achievement->update($validated);

        return response()->json($achievement);
    }

    /**
     * Remove the specified achievement.
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return response()->json(null, 204);
    }
}
