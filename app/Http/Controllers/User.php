<?php

namespace App\Http\Controllers;

use App\Helpers\Wrapper\Wrapper;
use App\modules\User\Worker;
use Illuminate\Http\Request;

class User extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    public function GetUser()
    {
        $result = Worker::GetUser();

        return Wrapper::sendResponse($result);
    }

    public function registerUser(Request $req)
    {
        $result = Worker::registerUser();

        return Wrapper::sendResponse($result);
    }
}
