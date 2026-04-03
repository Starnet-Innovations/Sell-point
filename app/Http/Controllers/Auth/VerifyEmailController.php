<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // 1. Mark as verified in DB
        $request->fulfill();

        // 2. Prepare your Toaster notification
        $notification = [
            'message' => 'Email verified successfully!',
            'alert-type' => 'success',
        ];

        // 3. Redirect to your index
        return redirect('/index')->with($notification);
    }
}
