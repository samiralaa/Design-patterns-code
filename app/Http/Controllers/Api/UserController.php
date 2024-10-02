<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Services\EmailService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // in this file need used SRP (Single Responsibility Principle)

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    public function register(StoreRequest $request) {
       
        $user = User::create($request->all());
        // user serves pattern will send welcome  email to user After registration
        $this->emailService->sendWelcomeEmail($user);
        return response()->json(['message' => 'User registered']);
    }

    // public function login(Request $request) {
    //     $credentials = $request->only('email', 'password');
    //     if (auth()->attempt($credentials)) {
    //         $token = auth()->user()->createToken('authToken')->accessToken;
    //         return response()->json(['token' => $token], 200);
    //     } else {
    //         return response()->json(['error' => 'Unauthorised'], 401);
    //     }
    // }

    public function activate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // تفعيل الحساب
        $user->activate();

        return response()->json(['message' => 'User account activated successfully', 'user' => $user]);
    }
}
