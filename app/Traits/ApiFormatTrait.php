<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiFormatTrait
{
    /**
     * Returns a successful API response.
     *
     * @param  mixed  $data  Response data
     * @param  string  $message  Response message
     * @param  int  $statusCode  HTTP status code
     */
    public function successResponse(mixed $data, string $message, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'statusCode' => $statusCode,
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Returns a failed  API response.
     *
     * @param  string  $message  fail message
     * @param  int  $statusCode  HTTP status code
     */
    public function errorResponse(string $message = 'Error', int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null,
        ], $statusCode);
    }
}
