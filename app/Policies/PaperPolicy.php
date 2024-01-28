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
    public function view($user)
    {
        return $user->email === 'teacher@gmail.com';
    }
}
