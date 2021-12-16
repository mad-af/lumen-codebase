<?php

namespace App\Modules\User\Commands;

class Schema {
    const REGISTER_USER = [
    'schema' => [
        'username' => ['string', 'required'],
        'password' => ['string', 'required']
    ],
];
const LOGIN_USER = [
    'schema' => [
        'username' => ['string', 'required'],
        'password' => ['string', 'required']
    ],
    'message' => [
        'username.required' => 'username tidak boleh kosong'
    ]
];
}

