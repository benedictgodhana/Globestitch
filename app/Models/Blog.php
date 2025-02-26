<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'slug',
        'reading_time',
        'created_by',
    ];

    /**
     * Get the user who created the blog.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
