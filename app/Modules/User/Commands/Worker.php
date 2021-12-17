<?php

namespace App\Modules\User\Commands;

use App\Helpers\Wrapper\Wrapper;
use App\Modules\User\Commands\Service as UserCommand;

interface WorkerInterface
{
    public function registerUser(array $payload);

    public function loginUser(array $payload);
}

class Worker implements WorkerInterface
{
    public function __construct()
    {
        $this->userCommand = new UserCommand();
    }

    public function registerUser(array $payload)
    {
        $user = $this->userCommand->insertOne($payload);

        return Wrapper::data($user);
    }

    public function loginUser(array $payload)
    {
        return Wrapper::data('$token');
    }
}
