<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    // let tell laravel about this relationship
    // this is done by adding methods to the models
    // Means the Book can have many reviews
    /**
     * Get the reviews for a particular book
     */
    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where("title", "LIKE", "%". $title . "%");
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder|QueryBuilder
    {
        return $query->withCount(["reviews" => function (Builder $q) use($from, $to) {
            if ($from && !$to) {
                $q->where("created_at", ">=", $from);
            }

        }])->orderBy("reviews_count", "desc");
    }

    public function scopeHighestRated(Builder $query): Builder|QueryBuilder 
    {
        return $query->withAvg("reviews", "rating")->orderBy("reviews_avg_rating", "desc");
    }
}
