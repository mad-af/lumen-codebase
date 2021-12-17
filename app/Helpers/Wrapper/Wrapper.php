<?php

namespace App\Helpers\Wrapper;

class Wrapper
{
    public static function data($data, $message = ''): array
    {
        return [
            'err' => null,
            'data' => $data,
            'message' => $message,
            'code' => 200,
        ];
    }

    public static function error(string $message, int $code): array
    {
        return [
            'err' => true,
            'message' => $message,
            'code' => $code,
        ];
    }

    public static function sendResponse(array $payload, $header = [])
    {
        $data = $payload['data'];
        $message = $payload['message'];
        $code = $payload['code'];

        $message = empty($message) ? 'Your Request Has Been Processed' : $message;
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message,
            'code' => 200,
        ];

        return response()->json($response, $code, $header);
    }

    public static function sendException(string $message, int $code, $header = [])
    {
        $response = [
            'success' => false,
            'data' => '',
            'message' => $message,
            'code' => $code,
        ];

        return response()->json($response, $code, $header);
    }
}
