<?php

namespace App\Http\Controllers;

use App\Helpers\Utils\Validate;
use App\Helpers\Wrapper\Wrapper;
use App\Modules\User\Commands\Schema as CommandSchema;
use App\Modules\User\Commands\Worker as CommandWorker;
use App\Modules\User\Queries\Worker as QueryWorker;
use Illuminate\Http\Request;

interface UserInterface
{
    // Queries
    public function getListUser();

    public function getProfile();

    // Commands
    public function registerUser(Request $request);

    public function loginUser(Request $request);
}

class UserController implements UserInterface
{
    public function __construct()
    {
        $this->queryWorker = new QueryWorker();
        $this->commandWorker = new CommandWorker();
    }

    public function getListUser()
    {
        $result = $this->queryWorker::getListUser();

        return Wrapper::sendResponse($result);
    }

    public function getProfile()
    {
        $result = $this->queryWorker::getProfile();

        return Wrapper::sendResponse($result);
    }

    public function registerUser(Request $request)
    {
        $isValid = Validate::isValidPayload($request->all(), CommandSchema::REGISTER_USER);
        $result = $this->commandWorker::registerUser($isValid);

        return Wrapper::sendResponse($result);
    }

    public function loginUser(Request $request)
    {
        $isValid = Validate::isValidPayload($request->all(), CommandSchema::LOGIN_USER);
        $result = $this->commandWorker::loginUser($isValid);

        return Wrapper::sendResponse($result);
    }
}
