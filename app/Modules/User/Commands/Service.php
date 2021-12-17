<?php

namespace App\Modules\User\Commands;

use App\Models\User;
use DB;

interface ServiceInterface
{
    public function insertOne($payload);
}

class Service implements ServiceInterface
{
    private $collection = 'Users';

    public function __construct()
    {
        $this->collection = DB::table($this->collection);
        $this->eloquent = new User();
    }

    public function insertOne($payload)
    {
        return $this->eloquent->create($payload);
    }
}
