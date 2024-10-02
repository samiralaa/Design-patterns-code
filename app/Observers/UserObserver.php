<?php

namespace App\Observers;

use App\Mail\UserActivated;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    public function activated(User $user)
    {
        try {
            Mail::to($user->email)->send(new UserActivated($user));
            Log::info("Email sent to {$user->email}");
        } catch (\Exception $e) {
            Log::error("Failed to send email: {$e->getMessage()}");
        }
    }
}
