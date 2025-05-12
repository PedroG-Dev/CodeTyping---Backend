<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Exercise::query();

        if ($request->has('programming_language_id')) {
            $query->where('programming_language_id', $request->programming_language_id);
        }

        if ($request->has('language_level_id')) {
            $query->where('language_level_id', $request->language_level_id);
        }

        $exercises = $query->where('is_active', true)
            ->orderBy('title')
            ->get();

        return response()->json($exercises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'programming_language_id' => 'required|exists:programming_languages,id',
            'language_level_id' => 'required|exists:language_levels,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:exercises',
            'description' => 'required|string',
            'code' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $exercise = Exercise::create($validated);

        return response()->json($exercise, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        return response()->json($exercise);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:exercises,slug,' . $exercise->id,
            'description' => 'sometimes|required|string',
            'code' => 'sometimes|required|string',
            'is_active' => 'boolean'
        ]);

        $exercise->update($validated);

        return response()->json($exercise);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return response()->json(null, 204);
    }
}
