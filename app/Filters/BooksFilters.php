<?php

namespace App\Filters;

use App\User;

class BooksFilters
{

    public function apply($builder)
    {

        if ($username = request('by')) {
            $user = User::where('name', $username)->firstOrFail();
            $builder->where('user_id', $user->id);
        }
        return $builder;
    }

}