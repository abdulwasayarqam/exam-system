<?php

namespace App\Policies;

use App\Models\User;

class PaperPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function view(User $user)
    {
        return $user->role === 'teacher';
    }
}
