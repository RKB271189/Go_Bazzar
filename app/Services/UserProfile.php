<?php

namespace App\Services;

use App\Models\UserProfile as ModelsUserProfile;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Model;

final class UserProfile extends ServiceRepository
{
    public function __construct(private ModelsUserProfile $userProfile)
    {
        parent::__construct($userProfile);
    }
    public function getProfileByUserId(int $userId): ?Model
    {
        $collection = $this->userProfile->where('user_id', $userId)->first();
        return $collection ? $collection : null;
    }
}
