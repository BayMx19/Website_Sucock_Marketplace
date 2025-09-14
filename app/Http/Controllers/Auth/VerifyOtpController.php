<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyOtpController extends Controller
{
    public function verifyOtpLink($user, $code)
    {
        $user = User::find($user);

        if (!$user) {
            return redirect()->route('register')->withErrors(['OTP' => 'Akun tidak ditemukan.']);
        }

        if ($user->otp_code === $code && $user->otp_expires_at > now()) {
            $user->update([
                'email_verified_at' => now(),
                'otp_code' => null,
                'otp_expires_at' => null
            ]);

            return redirect()->route('login')->with('verified', true);
        }

        return redirect()->route('register')->withErrors(['otp' => 'Kode OTP salah atau sudah kadaluarsa']);
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $userId = session('pending_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('register')->withErrors(['otp' => 'Akun tidak ditemukan.']);
        }

        if ($user->otp_code === $request->otp && $user->otp_expires_at > now()) {
            $user->update([
                'email_verified_at' => now(),
                'otp_code' => null,
                'otp_expires_at' => null
            ]);

            session()->forget('pending_user_id');

            return redirect()->route('login')->with('verified', true);
        }

        return back()->withErrors(['otp' => 'Kode OTP salah atau sudah kadaluarsa']);
    }

}
