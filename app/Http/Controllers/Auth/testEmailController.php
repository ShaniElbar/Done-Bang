<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class testEmailController extends Controller
{
    public function sendTestEmail()
    {
        $user = Auth::user();

        if ($user) {
            
            $data = [
                'name' => $user->name,
                'email' => $user->email,
            ];

            Mail::to($user->email)->send(new TestEmail($data));

            return redirect()->route('themes.default.inbox')->with('success', 'email berhasil di kirim');
        } else {
            return redirect()->route('themes.default.inbox')->with('error', 'email tidak di temukan');
        }
    }
}
