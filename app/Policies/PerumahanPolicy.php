<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Perumahan;

class PerumahanPolicy
{
    /**
     * Determine whether the user can view any perumahan.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the perumahan.
     */
    public function view(User $user, Perumahan $perumahan)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can create perumahan.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the perumahan.
     */
    public function update(User $user, Perumahan $perumahan)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the perumahan.
     */
    public function delete(User $user, Perumahan $perumahan)
    {
        return $user->role === 'admin';
    }
}