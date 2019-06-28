<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
//test git
        static::addGlobalScope('reviewCount', function ($builder) {
            $builder->withCount('reviews');
        });
        static::deleting(function ($book) {
            $book->reviews()->delete();
        });
    }

    public function scopeFilter($query, $filters)
    {

        return $filters->apply($query);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addReview($review)
    {
        $this->reviews()->create($review);
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
        if (!$this->favorites()->where(['user_id' => Auth()->id()])->exists()) {
            return $this->favorites()->create(['user_id' => Auth()->id()]);
        }

    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', Auth()->id())->exists();
    }


}
