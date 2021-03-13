<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Get the category of the task.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
