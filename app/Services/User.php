<?php

namespace App\Services;

use App\Models\User as ModelsUser;
use App\Services\Contracts\ServiceRepository;

final class User extends ServiceRepository
{
    public function __construct(private ModelsUser $user)
    {
        parent::__construct($user);
    }
}
