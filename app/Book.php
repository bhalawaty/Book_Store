<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function discount()
    {
        return $this->belongsToMany(Discount::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addReview($review)
    {
        $this->reviews()->create($review);
    }


}
