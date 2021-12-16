<?php

namespace App\Modules\User\Commands;

class Schema
{
    public const REGISTER_USER = [
        'schema' => [
            'username' => ['string', 'required'],
            'password' => ['string', 'required'],
        ],
    ];
    public const LOGIN_USER = [
        'schema' => [
            'username' => ['string', 'required'],
            'password' => ['string', 'required'],
        ],
        'message' => [
            'username.required' => 'username tidak boleh kosong',
        ],
    ];
}
