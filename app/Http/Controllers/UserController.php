<?php

namespace App\Http\Controllers;

use App\Helpers\Wrapper\Wrapper;
use App\modules\User\Schema;
use App\modules\User\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        // dd(auth()->payload()->toArray());
        // $isValid = Validator::make($req, Schema::REGISTER_USER);
        // $result = Worker::registerUser($isValid);

        return Wrapper::sendResponse($result);
    }
}
