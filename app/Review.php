<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
