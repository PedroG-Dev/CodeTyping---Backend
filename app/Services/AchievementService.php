<?php

namespace App\Services;

use App\Models\Achievement;
use App\Models\User;
use App\Models\CompletedExercise;
use Illuminate\Support\Facades\DB;

class AchievementService
{
    /**
     * Check and unlock achievements for a user
     *
     * @param User $user
     * @return array Newly unlocked achievements
     */
    public function checkAchievements(User $user): array
    {
        $newlyUnlocked = [];

        // Check exercise-based achievements
        $completedCount = $user->completedExercises()->count();
        $exerciseAchievements = Achievement::where('type', 'exercises')
            ->where('threshold', '<=', $completedCount)
            ->get();

        foreach ($exerciseAchievements as $achievement) {
            if (!$user->achievements->contains($achievement->id)) {
                $this->unlockAchievement($user, $achievement);
                $newlyUnlocked[] = $achievement;
            }
        }

        // Check points-based achievements
        $totalPoints = $user->completedExercises()->sum('score');
        $pointsAchievements = Achievement::where('type', 'points')
            ->where('threshold', '<=', $totalPoints)
            ->get();

        foreach ($pointsAchievements as $achievement) {
            if (!$user->achievements->contains($achievement->id)) {
                $this->unlockAchievement($user, $achievement);
                $newlyUnlocked[] = $achievement;
            }
        }

        return $newlyUnlocked;
    }

    /**
     * Unlock an achievement for a user
     *
     * @param User $user
     * @param Achievement $achievement
     * @return void
     */
    public function unlockAchievement(User $user, Achievement $achievement): void
    {
        $user->achievements()->attach($achievement->id, [
            'unlocked_at' => now()
        ]);
    }

    /**
     * Check for achievements after completing an exercise
     *
     * @param User $user
     * @param CompletedExercise $completedExercise
     * @return array Newly unlocked achievements
     */
    public function processExerciseCompletion(User $user, CompletedExercise $completedExercise): array
    {
        return $this->checkAchievements($user);
    }
}