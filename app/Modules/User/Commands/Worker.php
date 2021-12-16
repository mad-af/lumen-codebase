<?php

namespace App\Modules\User\Commands;

use App\Helpers\Wrapper\Wrapper;

interface WorkerInterface
{
    public function registerUser(array $payload);

    public function loginUser(array $payload);
}

class Worker implements WorkerInterface
{
    public function registerUser(array $payload)
    {
        return Wrapper::data($payload);
    }

    public function loginUser(array $payload)
    {
        return Wrapper::data($token);
    }
}
