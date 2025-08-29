<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->getData();

        $user = User::create($data);

        return response()->json([
            'user' => $user->only(['id','name','email']),
            'token' => $user->createToken('laravel_api_token')->plainTextToken,
        ]);
    }
}
