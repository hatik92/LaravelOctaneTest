<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/sign-in",
     *   tags={"Login & Logout"},
     *   summary="Login Api",
     *   operationId="app\Http\Controllers\AuthController@logIn",
     *
     *  @OA\RequestBody(
     *        @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Schema(
     *            @OA\Property(
     *                property="email",
     *                type="string"
     *            ),
     *            @OA\Property(
     *                property="password",
     *                type="string"
     *            ),
     *            example={"email": "bert.powlowski@example.com", "password": "password"}
     *        )
     *     )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *)
     **/
    public function logIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [
                    __('auth.failed')
                ]
            ]);
        }

        return Auth::user();
    }
}
