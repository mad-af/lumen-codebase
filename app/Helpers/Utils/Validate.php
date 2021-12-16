<?php

namespace App\Helpers\Utils;

use Exception;
use App\Helpers\Wrapper\Wrapper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Validate {
    public static function isValidPayload(array $payload, array $constraint) {
      $schema = $constraint['schema'];
      $message = $constraint['message'] ?? [];
      $validation =Validator::make($payload, $schema, $message);
        if ($validation->fails()) {
          throw ValidationException::withMessages((array)$validation->errors());
        }
        
        return $validation->validated();
    }

}