<?php

namespace App\Modules\User\Queries;

use App\Helpers\Wrapper\Wrapper;
use App\Modules\User\Queries\Service as UserQuery;

interface WorkerInterface
{
    public function getListUser();

    public function getProfile(array $payload);
}

class Worker implements WorkerInterface
{
    public function __construct()
    {
        $this->userQuery = new UserQuery();
    }

    public function getListUser()
    {
        return Wrapper::data('$token');
    }

    public function getProfile(array $payload)
    {
        $user = $this->userQuery->findOne($payload);
        $token = auth()->login($user);

        return Wrapper::data($token);
    }
}
