<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function invite(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'category_id' => 'required|exists:categories,id',
            'role' => 'required|in:owner,guest',
        ]);


        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User dengan email tersebut belum terdaftar.');
        }


        $exists = Team::where('user_id', $user->id)
            ->where('category_id', $request->category_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'User sudah tergabung di kategori ini.');
        }


        
        Team::create([
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'role' => $request->role,
        ]);

        return back()->with('success', 'User berhasil ditambahkan ke tim.');
    }


}
