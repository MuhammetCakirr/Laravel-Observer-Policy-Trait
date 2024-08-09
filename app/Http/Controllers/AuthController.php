<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request): JsonResponse
    {
        $validatedData = collect($request->validated());

        if (Auth::attempt(['email' => $validatedData->get('email'), 'password' => $validatedData->get('password')])) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            $data = [
                'status' => 200,
                'message' => 'Login was made successfully.',
                'token' => $token,
            ];
        } else {

            $data = [
                'status' => 400,
                'message' => 'User for this information could not be found.The wrong password or email.',

            ];
        }

        return response()->json($data);
    }

    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'message' => 'Logout successful.',
        ]);
    }
}
