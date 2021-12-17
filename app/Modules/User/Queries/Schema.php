<?php

namespace App\Modules\User\Queries;

class Schema
{
    public const GET_PROFILE = [
        'schema' => [
            'userId' => ['integer', 'required'],
        ],
    ];
}
