<?php

namespace App\Modules\User\Queries;

use App\Models\User;
use DB;

interface ServiceInterface
{
    public function findOne($payload);
}

class Service implements ServiceInterface
{
    private $collection = 'Users';

    public function __construct()
    {
        $this->collection = DB::table($this->collection);
        $this->eloquent = new User();
    }

    public function findOne($payload)
    {
        return $this->collection->where('id', $payload['userId'])->first();
    }
}
