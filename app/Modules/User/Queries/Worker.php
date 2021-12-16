<?php

namespace App\Modules\User\Queries;

use App\Helpers\Wrapper\Wrapper;

interface WorkerInterface {
    public function getListUser();
    public function getProfile();
}

class Worker implements WorkerInterface
{
    public function getListUser()
    {
        return Wrapper::data('$token');
    }

    public function getProfile()
    {
        return Wrapper::data('Hallo');
    }
}
