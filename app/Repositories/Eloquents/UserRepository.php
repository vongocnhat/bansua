<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
	public function all()
    {
        return User::all();
    }

    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }
}