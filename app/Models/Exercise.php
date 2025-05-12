<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'programming_language_id',
        'language_level_id',
        'title',
        'slug',
        'description',
        'code',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    public function languageLevel()
    {
        return $this->belongsTo(LanguageLevel::class);
    }
}
