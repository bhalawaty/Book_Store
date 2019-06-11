<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class BooksFilters extends Filters
{

    protected $filters = ['by', 'popularity'];

    /**
     * @param $builder
     * @param $username
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

    public function popularity()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('reviews_count', 'desc');
    }
}