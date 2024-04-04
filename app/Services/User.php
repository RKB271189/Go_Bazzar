<?php

namespace App\Services;

use App\Models\User as ModelsUser;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Model;

final class User extends ServiceRepository
{
    public function __construct(private ModelsUser $user)
    {
        parent::__construct($user);
    }
    public function validateEmail(string $email): ?Model
    {
        $collection = $this->user->where('email', $email)->first();
        return $collection ? $collection : null;
    }
}
