<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamPolicy
{
    // app/Policies/TeamPolicy.php
    public function update(User $user, Team $team)
    {
        return $team->created_by === $user->id ||
            $team->members()->where('user_id', $user->id)->where('role', 'admin')->exists();
    }

    public function delete(User $user, Team $team)
    {
        return $team->created_by === $user->id;
    }
}
