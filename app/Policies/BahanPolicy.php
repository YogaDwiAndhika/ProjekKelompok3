<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bahan;

class BahanPolicy
{
    /**
     * Determine whether the user can view any bahan.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can view the bahan.
     */
    public function view(User $user, Bahan $bahan)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can create bahan.
     */
    public function create(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can update the bahan.
     */
    public function update(User $user, Bahan $bahan)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can delete the bahan.
     */
    public function delete(User $user, Bahan $bahan)
    {
        return $user->role === 'manajer';
    }
}