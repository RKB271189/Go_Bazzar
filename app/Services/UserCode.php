<?php

namespace App\Services;

use App\Models\UserCode as ModelsUserCode;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Model;

final class UserCode extends ServiceRepository
{
    public function __construct(private ModelsUserCode $userCode)
    {
        parent::__construct($userCode);
    }
    public function validateEmail($email): ?Model
    {
        $collection = $this->userCode->where('email', $email)->first();
        return $collection ? $collection : null;
    }
    public function validateCode($email, $code): bool
    {
        $collection = $this->userCode->where('email', $email)->where('code', $code)->first();
        return $collection ? true : false;
    }
}
