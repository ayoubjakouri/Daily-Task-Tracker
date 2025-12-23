<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = 
    [
        'title', 
        'description', 
        'due_date', 
        'completed_at', 
        'user_id', 
        'category_id'
    ];

    protected $casts = [
        'due_date' => 'date',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    // Helper attribute
    protected function isCompleted(): Attribute
    {
        return Attribute::make(
            get: fn () => !is_null($this->completed_at)
        );
    }

}
