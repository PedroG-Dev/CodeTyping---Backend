<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'score',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'score' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
