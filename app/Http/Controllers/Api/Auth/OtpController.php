<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SendOtpNotification;

class OtpController extends Controller
{

    public function verify(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'otp' => 'required|string|size:6',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 400);
        }

        if ($user->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user->markEmailAsVerified();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Email verified successfully',
            'token' => $token,
        ], 200);
    }
    
    public function resendOtp(Request $request)
    {
        $request->validate(['username' => 'required|string|exists:users,username']);

        $user = User::where('username', $request->username)->first();
        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 400);
        }

        $otp = rand(100000, 999999);
        $user->update(['otp' => $otp]);
        $user->notify(new SendOtpNotification($otp));

        return response()->json(['message' => 'OTP resent to your email'], 200);
    }
}
