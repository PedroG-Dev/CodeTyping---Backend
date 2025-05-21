<?php

namespace App\Http\Controllers;

use App\Models\AchievementUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AchievementUser::with(['user', 'achievement']);

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('achievement_id')) {
            $query->where('achievement_id', $request->achievement_id);
        }

        $userAchievements = $query->get();

        return response()->json($userAchievements);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'achievement_id' => 'required|exists:achievements,id',
            'unlocked_at' => 'nullable|date'
        ]);

        $validated['unlocked_at'] = $validated['unlocked_at'] ?? now();

        // Verificar si ya existe
        $exists = AchievementUser::where('user_id', $validated['user_id'])
            ->where('achievement_id', $validated['achievement_id'])
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Este logro ya está asignado a este usuario'
            ], 422);
        }

        $userAchievement = AchievementUser::create($validated);

        return response()->json($userAchievement, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AchievementUser $achievementUser)
    {
        return response()->json($achievementUser->load(['user', 'achievement']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AchievementUser $achievementUser)
    {
        $validated = $request->validate([
            'unlocked_at' => 'nullable|date'
        ]);

        $achievementUser->update($validated);

        return response()->json($achievementUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AchievementUser $achievementUser)
    {
        $achievementUser->delete();

        return response()->json(null, 204);
    }
}