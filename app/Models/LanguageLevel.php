<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LanguageLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'programming_language_id',
        'name',
        'slug',
        'description',
        'is_active'
    ];

    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
