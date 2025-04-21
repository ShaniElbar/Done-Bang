<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);


        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        Auth::login($user);

        return redirect()->route('auth.createProfile');
    }

    public function profile()
    {
        $user = User::first();
        return view('auth.createProfile', compact('user'));
    }

    public function profileStore(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'forteam' => 'nullable'
        ]);


        $user = Auth::user();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('uploads', 'public');
        }

        DB::table('users')->where('id', $user->id)->update([
            'name' => $request->name,
            'forteam' => $request->boolean('forteam'),
            'photo' => $photoPath ?? $user->photo,
        ]);

        return redirect()->route('auth.plan');
    }


    public function plan()
    {
        return view('auth.plan');
    }

    public function planStore(Request $request)
    {
        $request->validate([
            'personal' => 'nullable|boolean',
            'work' => 'nullable|boolean',
            'education' => 'nullable|boolean'
        ]);

        $user = Auth::user();

        DB::table('users')->where('id', $user->id)->update([
            'personal' => $request->boolean('personal'),
            'work' => $request->boolean('work'),
            'education' => $request->boolean('education'),
        ]);

        return redirect()->route('themes.default.inbox');
    }

    public function verifyEmail()
    {

        if(Auth::check()){
            $userId = Auth::id();
    
            DB::table('users')->where('id', $userId)->update([
                'email_verified_at' => Carbon::now(),
            ]);
    
            return redirect()->route('themes.default.inbox'); 
        }
    
        return redirect()->route('auth.register');
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential)){
            $user = Auth::user();

            if(empty($user->name)){
                return redirect()->route('auth.createProfile');
            }

            return redirect()->route('themes.default.inbox');
        }

        return redirect()->route('auth.login')->with('message', 'Email atau password salah')->withInput();


    }
}
