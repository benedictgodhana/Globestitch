<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
        'created_by',
        'experience_id', // Add experience_id to fillable

    ];

    /**
     * Get the user who created the trip.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
