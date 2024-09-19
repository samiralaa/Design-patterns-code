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
        $this->emailService->sendWelcomeEmail($user);
        return response()->json(['message' => 'User registered']);
    }
}
