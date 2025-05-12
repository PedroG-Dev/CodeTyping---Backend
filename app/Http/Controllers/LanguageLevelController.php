<?php

namespace App\Http\Controllers;

use App\Models\LanguageLevel;
use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;

class LanguageLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LanguageLevel::query();

        if ($request->has('programming_language_id')) {
            $query->where('programming_language_id', $request->programming_language_id);
        }

        $levels = $query->where('is_active', true)
            ->orderBy('name')
            ->get();

        return response()->json($levels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'programming_language_id' => 'required|exists:programming_languages,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:language_levels',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $level = LanguageLevel::create($validated);

        return response()->json($level, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LanguageLevel $languageLevel)
    {
        return response()->json($languageLevel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LanguageLevel $languageLevel)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:language_levels,slug,' . $languageLevel->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $languageLevel->update($validated);

        return response()->json($languageLevel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LanguageLevel $languageLevel)
    {
        $languageLevel->delete();

        return response()->json(null, 204);
    }
}
