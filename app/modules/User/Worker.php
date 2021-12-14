<?php

namespace App\modules\User;

use App\Helpers\Wrapper\Wrapper;

class Worker
{
    public function GetUser()
    {
        $coba = [
            'username' => '',
            'password' => '',
        ];
        $token = auth()->attempt($coba);

        return Wrapper::data($token);
    }

    public function registerUser()
    {
        return Wrapper::data('APA KABAR');
    }
}
