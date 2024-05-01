<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    // telling laravel about the relationship
    // specifies that each review belongs to one book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
   
}
