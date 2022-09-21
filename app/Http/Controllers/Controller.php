<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Respond the error of 'Resource Not Found'.
     *
     * @param  array $errors
     * @return JsonResponse
     */
    public function modelNotFound(array $errors = []): JsonResponse
    {
        $message = "Object not found";
        return $this->errorResponse($message, Response::HTTP_NOT_FOUND, $errors);
    }

    /**
     * Respond the error message.
     *
     * @param string $message
     * @param string $errorCode
     * @param array $errors
     * @return JsonResponse
     */
    function errorResponse(string $message, string $errorCode, array $errors = []): JsonResponse
    {
        $data = [
            "success" => false,
            "status" => $errorCode,
            "error_message" => $message,
            'errors' => $errors
        ];

        return response()->json($data, $errorCode);
    }
}
