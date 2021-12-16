<?php

namespace App\Helpers\Wrapper;

class Wrapper
{
    public static function data($data, $message = '')
    {
        return [
            'err' => null,
            'data' => $data,
            'message' => $message,
            'code' => 200,
        ];
    }

    public static function error($message = '', $code = 500)
    {
        return [
            'err' => true,
            'data' => '',
            'message' => $message,
            'code' => $code,
        ];
    }

    public static function sendResponse($param, $header = [])
    {
        $data = $param['data'];
        $message = $param['message'];
        $code = $param['code'];

        $response = [];
        if (!empty($param['err'])) {
            $response = [
                'success' => false,
                'data' => $data,
                'message' => $message,
                'code' => $code,
            ];
        } else {
            $message = empty($message) ? 'Your Request Has Been Processed' : $message;
            $response = [
                'success' => true,
                'data' => $data,
                'message' => $message,
                'code' => 200,
            ];
        }

        return response()->json($response, $code, $header);
    }
}
