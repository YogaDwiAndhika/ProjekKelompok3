<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Detailproyek;

class DetailproyekPolicy
{
    /**
     * Determine whether the user can view any detailproyek.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can view the detailproyek.
     */
    public function view(User $user, Detailproyek $detailproyek)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can create detailproyek.
     */
    public function create(User $user)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can update the detailproyek.
     */
    public function update(User $user, Detailproyek $detailproyek)
    {
        return $user->role === 'manajer';
    }

    /**
     * Determine whether the user can delete the detailproyek.
     */
    public function delete(User $user, Detailproyek $detailproyek)
    {
        return $user->role === 'manajer';
    }
}