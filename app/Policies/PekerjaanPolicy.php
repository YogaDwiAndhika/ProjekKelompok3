<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pekerjaan;

class PekerjaanPolicy
{
    /**
     * Determine whether the user can view any pekerjaan.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can view the pekerjaan.
     */
    public function view(User $user, Pekerjaan $pekerjaan)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can create pekerjaan.
     */
    public function create(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can update the pekerjaan.
     */
    public function update(User $user, Pekerjaan $pekerjaan)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can delete the pekerjaan.
     */
    public function delete(User $user, Pekerjaan $pekerjaan)
    {
        return $user->role === 'manajer';
    }
}