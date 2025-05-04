<?php

namespace App\Http\Controllers;

use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;

class ProgrammingLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = ProgrammingLanguage::where('is_active', true)
            ->orderBy('name')
            ->get();

        return response()->json($languages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:programming_languages',
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $language = ProgrammingLanguage::create($validated);

        return response()->json($language, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgrammingLanguage $programmingLanguage)
    {
        return response()->json($programmingLanguage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgrammingLanguage $programmingLanguage)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:programming_languages,slug,' . $programmingLanguage->id,
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $programmingLanguage->update($validated);

        return response()->json($programmingLanguage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgrammingLanguage $programmingLanguage)
    {
        $programmingLanguage->delete();

        return response()->json(null, 204);
    }
}
