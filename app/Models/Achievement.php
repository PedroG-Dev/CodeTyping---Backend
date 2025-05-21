<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'threshold',
        'icon'
    ];

    /**
     * The users that have unlocked this achievement.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('unlocked_at')
            ->withTimestamps();
    }
}
