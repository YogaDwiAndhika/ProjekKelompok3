<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Transaksi;

class TransaksiPolicy
{
    /**
     * Determine whether the user can view any transaksi.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the transaksi.
     */
    public function view(User $user, Transaksi $transaksi)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can create transaksi.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the transaksi.
     */
    public function update(User $user, Transaksi $transaksi)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the transaksi.
     */
    public function delete(User $user, Transaksi $transaksi)
    {
        return $user->role === 'admin';
    }
}