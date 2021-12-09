<?php

namespace App\Helpers\Wrapper;

class Wrapper
{
    public static function result($data, $massage = '')
    {
        return [
            'err' => null,
            'data' => $data,
            'massage' => $massage,
            'code' => 200,
        ];
    }

    public static function sendResponse($param)
    {
        $data = $param['data'];
        $message = $param['massage'];
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

        return response()->json($response, $code);
    }
}
