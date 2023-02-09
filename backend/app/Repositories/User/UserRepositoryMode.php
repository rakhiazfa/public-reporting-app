<?php

namespace App\Repositories\User;

use App\Foundation\Repository\RepositoryModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepositoryModel extends RepositoryModel implements UserRepository
{
    /**
     * @var User
     */
    protected User $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * 
     * @return User
     */
    public function new(array $attributes = []): User
    {
        return new User($attributes);
    }
}
