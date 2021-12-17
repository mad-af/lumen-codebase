<?php

namespace App\Http\Controllers;

use App\Helpers\Utils\Validate;
use App\Helpers\Wrapper\Wrapper;
use App\Modules\User\Commands\Schema as CommandSchema;
use App\Modules\User\Commands\Worker as CommandWorker;
use App\Modules\User\Queries\Schema as QuerySchema;
use App\Modules\User\Queries\Worker as QueryWorker;
use Illuminate\Http\Request;

interface UserInterface
{
    // Queries
    public function getListUser();

    public function getProfile($userId);

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
        $result = $this->queryWorker->getListUser();

        return Wrapper::sendResponse($result);
    }

    public function getProfile($userId)
    {
        $payload = ['userId' => $userId];
        $isValid = Validate::isValidPayload($payload, QuerySchema::GET_PROFILE);
        $result = $this->queryWorker->getProfile($isValid);

        return Wrapper::sendResponse($result);
    }

    public function registerUser(Request $request)
    {
        $payload = $request->all();
        $isValid = Validate::isValidPayload($payload, CommandSchema::REGISTER_USER);
        $result = $this->commandWorker->registerUser($isValid);

        return Wrapper::sendResponse($result);
    }

    public function loginUser(Request $request)
    {
        $payload = $request->all();
        $isValid = Validate::isValidPayload($payload, CommandSchema::LOGIN_USER);
        $result = $this->commandWorker->loginUser($isValid);

        return Wrapper::sendResponse($result);
    }
}
