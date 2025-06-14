<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Proyek;

class ProyekPolicy
{
    /**
     * Determine whether the user can view any proyek.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can view the proyek.
     */
    public function view(User $user, Proyek $proyek)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can create proyek.
     */
    public function create(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can update the proyek.
     */
    public function update(User $user, Proyek $proyek)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can delete the proyek.
     */
    public function delete(User $user, Proyek $proyek)
    {
        return $user->role === 'manajer';
    }
}